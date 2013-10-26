<?php namespace Hills\Mailers;

use Mail;

/**
 * Mailer abstract class
 */
abstract class Mailer {

    /**
     * Sending an email
     * @param  object $user    Eloquent User Object
     * @param  string $subject Email subject
     * @param  string $view    Email template
     * @param  array $data
     * @return void
     */
    public function sendTo($user, $subject, $view, $data = [])
    {
        // TODO: Nanti diganti pakai Mail::queue()
        Mail::send($view, $data, function($message) use ($user, $subject)
        {
            $message->to($user->email)
                    ->subject($subject);
        });

    }

}
