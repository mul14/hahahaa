@extends('layouts.default')

@section('main')

<h2>List of projects</h2>

{{ link_to_route('project.create', 'Create new project', [], ['class' => 'btn btn-primary']) }}

<ul>
    @foreach($projects as $project)
        <li>{{ link_to_route('project.task.index', $project->name, $project->id) }}</li>
    @endforeach
</ul>

{{ $projects->links() }}

@stop
