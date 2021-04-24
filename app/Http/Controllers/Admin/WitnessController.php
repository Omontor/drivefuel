<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyWitnessRequest;
use App\Http\Requests\StoreWitnessRequest;
use App\Http\Requests\UpdateWitnessRequest;
use App\Models\Witness;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WitnessController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('witness_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $witnesses = Witness::all();

        return view('admin.witnesses.index', compact('witnesses'));
    }

    public function create()
    {
        abort_if(Gate::denies('witness_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.witnesses.create');
    }

    public function store(StoreWitnessRequest $request)
    {
        $witness = Witness::create($request->all());

        return redirect()->route('admin.witnesses.index');
    }

    public function edit(Witness $witness)
    {
        abort_if(Gate::denies('witness_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.witnesses.edit', compact('witness'));
    }

    public function update(UpdateWitnessRequest $request, Witness $witness)
    {
        $witness->update($request->all());

        return redirect()->route('admin.witnesses.index');
    }

    public function show(Witness $witness)
    {
        abort_if(Gate::denies('witness_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.witnesses.show', compact('witness'));
    }

    public function destroy(Witness $witness)
    {
        abort_if(Gate::denies('witness_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $witness->delete();

        return back();
    }

    public function massDestroy(MassDestroyWitnessRequest $request)
    {
        Witness::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
