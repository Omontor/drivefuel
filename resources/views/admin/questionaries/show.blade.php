@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.questionarie.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.questionaries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.questionarie.fields.id') }}
                        </th>
                        <td>
                            {{ $questionarie->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.questionarie.fields.name') }}
                        </th>
                        <td>
                            {{ $questionarie->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.questionarie.fields.project') }}
                        </th>
                        <td>
                            {{ $questionarie->project->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.questionaries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#questionarie_trivia" role="tab" data-toggle="tab">
                {{ trans('cruds.trivia.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="questionarie_trivia">
            @includeIf('admin.questionaries.relationships.questionarieTrivia', ['trivia' => $questionarie->questionarieTrivia])
        </div>
    </div>
</div>

@endsection