@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.event.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.events.update", [$event->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="date">{{ trans('cruds.event.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date', $event->date) }}" required>
                @if($errors->has('date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="start">{{ trans('cruds.event.fields.start') }}</label>
                <input class="form-control timepicker {{ $errors->has('start') ? 'is-invalid' : '' }}" type="text" name="start" id="start" value="{{ old('start', $event->start) }}" required>
                @if($errors->has('start'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.start_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="end">{{ trans('cruds.event.fields.end') }}</label>
                <input class="form-control timepicker {{ $errors->has('end') ? 'is-invalid' : '' }}" type="text" name="end" id="end" value="{{ old('end', $event->end) }}" required>
                @if($errors->has('end'))
                    <div class="invalid-feedback">
                        {{ $errors->first('end') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.end_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="route_id">{{ trans('cruds.event.fields.route') }}</label>
                <select class="form-control select2 {{ $errors->has('route') ? 'is-invalid' : '' }}" name="route_id" id="route_id" required>
                    @foreach($routes as $id => $entry)
                        <option value="{{ $id }}" {{ (old('route_id') ? old('route_id') : $event->route->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('route'))
                    <div class="invalid-feedback">
                        {{ $errors->first('route') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.route_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="users">{{ trans('cruds.event.fields.users') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('users') ? 'is-invalid' : '' }}" name="users[]" id="users" multiple required>
                    @foreach($users as $id => $users)
                        <option value="{{ $id }}" {{ (in_array($id, old('users', [])) || $event->users->contains($id)) ? 'selected' : '' }}>{{ $users }}</option>
                    @endforeach
                </select>
                @if($errors->has('users'))
                    <div class="invalid-feedback">
                        {{ $errors->first('users') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.users_helper') }}</span>
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