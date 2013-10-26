<?php namespace Hills\Mailers;

use Hills\Mailers\Mailer;

/**
 * User Mail events
 */
class UserMailer extends Mailer
{

    /**
     * Subscribe mail events when do something to users
     * @param  object $events Events object
     * @return void
     */
    public function subscribe($events)
    {
        // $event->listen(name_of_events, 'class@method')
        $events->listen('users.create', 'Hills\Mailers\UserMailer@create');
        $events->listen('users.update', 'Hills\Mailers\UserMailer@update');
        $events->listen('users.delete', 'Hills\Mailers\UserMailer@delete');
    }

    /**
     * Sending email to user or administrator when create new user
     * @param  object  $user   Eloquent User object
     * @return boolean         Email status
     */
    public function create($user)
    {
        // Send email to users

        $subject = 'Welcome ' . $user->name;
        $view = 'emails.users.create';

        $this->sendTo($user, $subject, $view);
    }

    /**
     * Sending email to user or administrator when update a user
     * @param  object  $user   Eloquent User object
     * @return boolean         Email status
     */
    public function update($user)
    {
        // Send email to users

        $subject = 'Your profile has been updated';
        $view = 'emails.users.update';

        $this->sendTo($user, $subject, $view);
    }

    /**
     * Sending email to user or administrator when delete a user
     * @param  object  $user   Eloquent User object
     * @return boolean         Email status
     */
    public function delete($user)
    {
        // Send email to users

        $subject = 'Good bye';
        $view = 'emails.users.delete';

        $this->sendTo($user, $subject, $view);
    }
}
