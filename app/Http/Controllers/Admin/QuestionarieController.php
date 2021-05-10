<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyQuestionarieRequest;
use App\Http\Requests\StoreQuestionarieRequest;
use App\Http\Requests\UpdateQuestionarieRequest;
use App\Models\Project;
use App\Models\Questionarie;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QuestionarieController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('questionarie_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questionaries = Questionarie::with(['project'])->get();

        $projects = Project::get();

        return view('admin.questionaries.index', compact('questionaries', 'projects'));
    }

    public function create()
    {
        abort_if(Gate::denies('questionarie_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projects = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.questionaries.create', compact('projects'));
    }

    public function store(StoreQuestionarieRequest $request)
    {
        $questionarie = Questionarie::create($request->all());

        return redirect()->route('admin.questionaries.index');
    }

    public function edit(Questionarie $questionarie, $id)
    {
        abort_if(Gate::denies('questionarie_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projects = Project::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $questionarie->load('project');
        $quest = Questionarie::find($id);

        return view('admin.questionaries.edit', compact('projects', 'questionarie', 'quest'));
    }

    public function update(UpdateQuestionarieRequest $request)
    {

        $questionarie = Questionarie::find($request->id);
        $questionarie->update($request->all());
        return redirect()->route('admin.questionaries.index');
    }

    public function show(Questionarie $questionarie)
    {
        abort_if(Gate::denies('questionarie_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questionarie->load('project', 'questionarieTrivia');

        return view('admin.questionaries.show', compact('questionarie'));
    }

    public function destroy(Questionarie $questionarie)
    {
        abort_if(Gate::denies('questionarie_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questionarie->delete();

        return back();
    }

    public function massDestroy(MassDestroyQuestionarieRequest $request)
    {
        Questionarie::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
