<?php

/**
 * Log events
 */

Event::subscribe('Hills\Logs\UserLog');
Event::subscribe('Hills\Logs\TaskLog');

/**
 * Mail event
 */

Event::subscribe('Hills\Mailers\UserMailer');
