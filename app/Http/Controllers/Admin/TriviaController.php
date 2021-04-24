<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTriviaRequest;
use App\Http\Requests\StoreTriviaRequest;
use App\Http\Requests\UpdateTriviaRequest;
use App\Models\Questionarie;
use App\Models\Trivia;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TriviaController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('trivia_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trivia = Trivia::with(['questionarie'])->get();

        $questionaries = Questionarie::get();

        return view('admin.trivia.index', compact('trivia', 'questionaries'));
    }

    public function create()
    {
        abort_if(Gate::denies('trivia_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questionaries = Questionarie::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.trivia.create', compact('questionaries'));
    }

    public function store(StoreTriviaRequest $request)
    {
        $trivia = Trivia::create($request->all());

        return redirect()->route('admin.trivia.index');
    }

    public function edit(Trivia $trivia)
    {
        abort_if(Gate::denies('trivia_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $questionaries = Questionarie::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $trivia->load('questionarie');

        return view('admin.trivia.edit', compact('questionaries', 'trivia'));
    }

    public function update(UpdateTriviaRequest $request, Trivia $trivia)
    {
        $trivia->update($request->all());

        return redirect()->route('admin.trivia.index');
    }

    public function show(Trivia $trivia)
    {
        abort_if(Gate::denies('trivia_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trivia->load('questionarie');

        return view('admin.trivia.show', compact('trivia'));
    }

    public function destroy(Trivia $trivia)
    {
        abort_if(Gate::denies('trivia_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trivia->delete();

        return back();
    }

    public function massDestroy(MassDestroyTriviaRequest $request)
    {
        Trivia::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
