@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.checkin.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.checkins.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="datetime">{{ trans('cruds.checkin.fields.datetime') }}</label>
                <input class="form-control datetime {{ $errors->has('datetime') ? 'is-invalid' : '' }}" type="text" name="datetime" id="datetime" value="{{ old('datetime') }}" required>
                @if($errors->has('datetime'))
                    <div class="invalid-feedback">
                        {{ $errors->first('datetime') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.checkin.fields.datetime_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.checkin.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.checkin.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="location_id">{{ trans('cruds.checkin.fields.location') }}</label>
                <select class="form-control select2 {{ $errors->has('location') ? 'is-invalid' : '' }}" name="location_id" id="location_id" required>
                    @foreach($locations as $id => $entry)
                        <option value="{{ $id }}" {{ old('location_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('location'))
                    <div class="invalid-feedback">
                        {{ $errors->first('location') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.checkin.fields.location_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="lat">{{ trans('cruds.checkin.fields.lat') }}</label>
                <input class="form-control {{ $errors->has('lat') ? 'is-invalid' : '' }}" type="text" name="lat" id="lat" value="{{ old('lat', '') }}" required>
                @if($errors->has('lat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lat') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.checkin.fields.lat_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="lng">{{ trans('cruds.checkin.fields.lng') }}</label>
                <input class="form-control {{ $errors->has('lng') ? 'is-invalid' : '' }}" type="text" name="lng" id="lng" value="{{ old('lng', '') }}" required>
                @if($errors->has('lng'))
                    <div class="invalid-feedback">
                        {{ $errors->first('lng') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.checkin.fields.lng_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection