@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.checkout.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.checkouts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.checkout.fields.id') }}
                        </th>
                        <td>
                            {{ $checkout->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.checkout.fields.datetime') }}
                        </th>
                        <td>
                            {{ $checkout->datetime }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.checkout.fields.user') }}
                        </th>
                        <td>
                            {{ $checkout->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.checkout.fields.location') }}
                        </th>
                        <td>
                            {{ $checkout->location->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.checkout.fields.lat') }}
                        </th>
                        <td>
                            {{ $checkout->lat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.checkout.fields.lng') }}
                        </th>
                        <td>
                            {{ $checkout->lng }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.checkouts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection