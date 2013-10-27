<h2>List of tasks in {{ $project->name }} project</h2>

<ul>
    @foreach($tasks as $task)
        <li>
            {{ link_to_route('project.task.show', $task->name, [$project->id, $task->id]) }}
        </li>
    @endforeach
</ul>

{{ $tasks->links() }}
