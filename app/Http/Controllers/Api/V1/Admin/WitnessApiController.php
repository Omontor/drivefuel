<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWitnessRequest;
use App\Http\Requests\UpdateWitnessRequest;
use App\Http\Resources\Admin\WitnessResource;
use App\Models\Witness;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WitnessApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('witness_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new WitnessResource(Witness::all());
    }

    public function store(StoreWitnessRequest $request)
    {
        $witness = Witness::create($request->all());

        return (new WitnessResource($witness))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Witness $witness)
    {
        abort_if(Gate::denies('witness_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new WitnessResource($witness);
    }

    public function update(UpdateWitnessRequest $request, Witness $witness)
    {
        $witness->update($request->all());

        return (new WitnessResource($witness))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Witness $witness)
    {
        abort_if(Gate::denies('witness_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $witness->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
