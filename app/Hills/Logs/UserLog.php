<?php namespace Hills\Logs;

class UserLog {

    public function subscribe($events)
    {
        $events->listen('users.create', 'Hills\Logs\UserLog@create');
        $events->listen('users.edit', 'Hills\Logs\UserLog@update');
        $events->listen('users.destroy', 'Hills\Logs\UserLog@destroy');
    }

    public function create()
    {
        // Create a log
    }

    public function destroy()
    {
        // Create a log
    }

    public function update()
    {
        // Create a log
    }

}
