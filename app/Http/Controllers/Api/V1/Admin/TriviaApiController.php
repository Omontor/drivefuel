<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTriviaRequest;
use App\Http\Requests\UpdateTriviaRequest;
use App\Http\Resources\Admin\TriviaResource;
use App\Models\Trivia;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TriviaApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('trivia_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TriviaResource(Trivia::with(['questionarie'])->get());
    }

    public function store(StoreTriviaRequest $request)
    {
        $trivia = Trivia::create($request->all());

        return (new TriviaResource($trivia))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Trivia $trivia)
    {
        abort_if(Gate::denies('trivia_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TriviaResource($trivia->load(['questionarie']));
    }

    public function update(UpdateTriviaRequest $request, Trivia $trivia)
    {
        $trivia->update($request->all());

        return (new TriviaResource($trivia))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Trivia $trivia)
    {
        abort_if(Gate::denies('trivia_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trivia->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
