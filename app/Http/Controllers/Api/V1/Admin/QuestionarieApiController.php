<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuestionarieRequest;
use App\Http\Requests\UpdateQuestionarieRequest;
use App\Http\Resources\Admin\QuestionarieResource;
use App\Models\Questionarie;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QuestionarieApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('questionarie_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new QuestionarieResource(Questionarie::with(['project'])->get());
    }

    public function store(StoreQuestionarieRequest $request)
    {
        $questionarie = Questionarie::create($request->all());

        return (new QuestionarieResource($questionarie))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Questionarie $questionarie)
    {
        abort_if(Gate::denies('questionarie_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new QuestionarieResource($questionarie->load(['project']));
    }

    public function update(UpdateQuestionarieRequest $request, Questionarie $questionarie)
    {
        $questionarie->update($request->all());

        return (new QuestionarieResource($questionarie))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Questionarie $questionarie)
    {
        abort_if(Gate::denies('questionarie_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questionarie->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
