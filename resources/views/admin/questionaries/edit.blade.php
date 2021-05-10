@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.questionarie.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.questionaries.update", $quest) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="form-group">
                
                <label class="required" for="id">ID <strong>{{$quest->id}}</strong></label>
                <br>
                <input class="form-control"  name="id" value="{{$quest->id}}"  id="id" hidden>
            </div>
            <div class="form-group">

                <label class="required" for="name">{{ trans('cruds.questionarie.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $quest->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.questionarie.fields.name_helper') }}</span>
            </div>
            <div class="form-group">

    <label for="project_id">{{ trans('cruds.questionarie.fields.project') }}</label>

                <select class="form-control select2 {{ $errors->has('project') ? 'is-invalid' : '' }}" name="project_id" id="project_id" required>
                    @foreach($projects as $id => $entry)
                        <option value="{{ $id }}" {{ (old('project_id') ? old('project_id') : $quest->project->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('project'))
                    <div class="invalid-feedback">
                        {{ $errors->first('project') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.questionarie.fields.project_helper') }}</span>
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