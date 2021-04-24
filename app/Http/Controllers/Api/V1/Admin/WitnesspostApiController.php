<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreWitnesspostRequest;
use App\Http\Requests\UpdateWitnesspostRequest;
use App\Http\Resources\Admin\WitnesspostResource;
use App\Models\Witnesspost;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WitnesspostApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('witnesspost_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new WitnesspostResource(Witnesspost::with(['witness', 'event'])->get());
    }

    public function store(StoreWitnesspostRequest $request)
    {
        $witnesspost = Witnesspost::create($request->all());

        if ($request->input('images', false)) {
            $witnesspost->addMedia(storage_path('tmp/uploads/' . basename($request->input('images'))))->toMediaCollection('images');
        }

        return (new WitnesspostResource($witnesspost))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Witnesspost $witnesspost)
    {
        abort_if(Gate::denies('witnesspost_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new WitnesspostResource($witnesspost->load(['witness', 'event']));
    }

    public function update(UpdateWitnesspostRequest $request, Witnesspost $witnesspost)
    {
        $witnesspost->update($request->all());

        if ($request->input('images', false)) {
            if (!$witnesspost->images || $request->input('images') !== $witnesspost->images->file_name) {
                if ($witnesspost->images) {
                    $witnesspost->images->delete();
                }
                $witnesspost->addMedia(storage_path('tmp/uploads/' . basename($request->input('images'))))->toMediaCollection('images');
            }
        } elseif ($witnesspost->images) {
            $witnesspost->images->delete();
        }

        return (new WitnesspostResource($witnesspost))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Witnesspost $witnesspost)
    {
        abort_if(Gate::denies('witnesspost_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $witnesspost->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
