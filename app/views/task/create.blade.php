@extends('layouts.default')

@section('main')

    <h2>Create task in "{{ $project->name }}" project.</h2>

    {{ Form::model('Task', ['route' => ['project.task.store', $project->id]]) }}
    {{ Form::hidden('project_id', $project->id) }}

    <div class="form-group">
        {{ Form::label('name', 'Task name') }}
        {{ Form::text('name') }}
    </div>

    {{ Form::submit('Create Task', ['class' => 'btn btn-primary']) }}
    {{ link_to_route('project.task.index', 'Back to task list', $project->id, ['class' => 'btn btn-default']) }}

    {{ Form::close() }}

@stop
