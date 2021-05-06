<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyWitnesspostRequest;
use App\Http\Requests\StoreWitnesspostRequest;
use App\Http\Requests\UpdateWitnesspostRequest;
use App\Models\Event;
use App\Models\User;
use App\Models\Witness;
use App\Models\Witnesspost;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class WitnesspostController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('witnesspost_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $witnessposts = Witnesspost::with(['witness', 'event', 'user', 'media'])->get();

        $witnesses = Witness::get();

        $events = Event::get();

        $users = User::get();

        return view('admin.witnessposts.index', compact('witnessposts', 'witnesses', 'events', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('witnesspost_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $witnesses = Witness::all()->pluck('type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $events = Event::all()->pluck('date', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.witnessposts.create', compact('witnesses', 'events', 'users'));
    }

    public function store(StoreWitnesspostRequest $request)
    {
        $witnesspost = Witnesspost::create($request->all());

        foreach ($request->input('images', []) as $file) {
            $witnesspost->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('images');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $witnesspost->id]);
        }

        return redirect()->route('admin.witnessposts.index');
    }

    public function edit(Witnesspost $witnesspost)
    {
        abort_if(Gate::denies('witnesspost_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $witnesses = Witness::all()->pluck('type', 'id')->prepend(trans('global.pleaseSelect'), '');

        $events = Event::all()->pluck('date', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $witnesspost->load('witness', 'event', 'user');

        return view('admin.witnessposts.edit', compact('witnesses', 'events', 'users', 'witnesspost'));
    }

    public function update(UpdateWitnesspostRequest $request, Witnesspost $witnesspost)
    {
        $witnesspost->update($request->all());

        if (count($witnesspost->images) > 0) {
            foreach ($witnesspost->images as $media) {
                if (!in_array($media->file_name, $request->input('images', []))) {
                    $media->delete();
                }
            }
        }
        $media = $witnesspost->images->pluck('file_name')->toArray();
        foreach ($request->input('images', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $witnesspost->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('images');
            }
        }

        return redirect()->route('admin.witnessposts.index');
    }

    public function show(Witnesspost $witnesspost)
    {
        abort_if(Gate::denies('witnesspost_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $witnesspost->load('witness', 'event', 'user');

        return view('admin.witnessposts.show', compact('witnesspost'));
    }

    public function destroy(Witnesspost $witnesspost)
    {
        abort_if(Gate::denies('witnesspost_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $witnesspost->delete();

        return back();
    }

    public function massDestroy(MassDestroyWitnesspostRequest $request)
    {
        Witnesspost::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('witnesspost_create') && Gate::denies('witnesspost_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Witnesspost();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
