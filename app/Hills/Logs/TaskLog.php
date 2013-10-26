<?php namespace Hills\Logs;

class TaskLog {

    public function subscribe($events)
    {
        $events->listen('tasks.create', 'Hills\Logs\TaskLog@create');
        $events->listen('tasks.update', 'Hills\Logs\TaskLog@update');
        $events->listen('tasks.delete', 'Hills\Logs\TaskLog@delete');
        $events->listen('tasks.done', 'Hills\Logs\TaskLog@done');
        $events->listen('tasks.completed', 'Hills\Logs\TaskLog@completed');
    }

    public function create()
    {
        // Create a log
    }

    public function delete()
    {
        // Create a log
    }

    public function update()
    {
        // Create a log
    }

    public function done()
    {
        // Create a log
    }

    public function completed()
    {
        // Create a log
    }

}
