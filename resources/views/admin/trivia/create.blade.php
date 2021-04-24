@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.trivia.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.trivia.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="questionarie_id">{{ trans('cruds.trivia.fields.questionarie') }}</label>
                <select class="form-control select2 {{ $errors->has('questionarie') ? 'is-invalid' : '' }}" name="questionarie_id" id="questionarie_id" required>
                    @foreach($questionaries as $id => $entry)
                        <option value="{{ $id }}" {{ old('questionarie_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('questionarie'))
                    <div class="invalid-feedback">
                        {{ $errors->first('questionarie') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.trivia.fields.questionarie_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="content">{{ trans('cruds.trivia.fields.content') }}</label>
                <input class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}" type="text" name="content" id="content" value="{{ old('content', '') }}" required>
                @if($errors->has('content'))
                    <div class="invalid-feedback">
                        {{ $errors->first('content') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.trivia.fields.content_helper') }}</span>
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