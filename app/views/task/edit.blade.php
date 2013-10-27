@extends('layouts.default')

@section('main')

    Edit task in "{{ $project->name }}" project.

    {{ Form::model('Task', ['method' => 'PUT', 'route' => ['project.task.update', $project->id, $task->id]]) }}

    <div class="form-group">
        {{ Form::label('name', 'Task name') }}
        {{ Form::text('name') }}
    </div>

    {{ Form::submit() }}

    {{ Form::close() }}

@stop
