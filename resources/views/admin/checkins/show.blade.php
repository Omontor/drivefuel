@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.checkin.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.checkins.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.checkin.fields.id') }}
                        </th>
                        <td>
                            {{ $checkin->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.checkin.fields.datetime') }}
                        </th>
                        <td>
                            {{ $checkin->datetime }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.checkin.fields.user') }}
                        </th>
                        <td>
                            {{ $checkin->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.checkin.fields.location') }}
                        </th>
                        <td>
                            {{ $checkin->location->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.checkin.fields.lat') }}
                        </th>
                        <td>
                            {{ $checkin->lat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.checkin.fields.lng') }}
                        </th>
                        <td>
                            {{ $checkin->lng }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.checkins.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection