<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCheckinRequest;
use App\Http\Requests\UpdateCheckinRequest;
use App\Http\Resources\Admin\CheckinResource;
use App\Models\Checkin;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckinApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('checkin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CheckinResource(Checkin::with(['user', 'location'])->get());
    }

    public function store(StoreCheckinRequest $request)
    {
        $checkin = Checkin::create($request->all());

        return (new CheckinResource($checkin))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Checkin $checkin)
    {
        abort_if(Gate::denies('checkin_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CheckinResource($checkin->load(['user', 'location']));
    }

    public function update(UpdateCheckinRequest $request, Checkin $checkin)
    {
        $checkin->update($request->all());

        return (new CheckinResource($checkin))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Checkin $checkin)
    {
        abort_if(Gate::denies('checkin_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $checkin->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
