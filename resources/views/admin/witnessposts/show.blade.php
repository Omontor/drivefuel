@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.witnesspost.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.witnessposts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.witnesspost.fields.id') }}
                        </th>
                        <td>
                            {{ $witnesspost->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.witnesspost.fields.witness') }}
                        </th>
                        <td>
                            {{ $witnesspost->witness->type ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.witnesspost.fields.event') }}
                        </th>
                        <td>
                            {{ $witnesspost->event->date ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.witnesspost.fields.images') }}
                        </th>
                        <td>
                            @foreach($witnesspost->images as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.witnesspost.fields.user') }}
                        </th>
                        <td>
                            {{ $witnesspost->user->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.witnessposts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection