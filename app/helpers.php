<?php

use App\Event;

function flash($title = null, $message = null)
{
    $flash = app('App\Http\flash');

    if (func_num_args() == 0) {
        return $flash;
    }

    return $flash->info($title, $message);
}

/**
 * Path to a given flyer
 *
 * @param Event $event
 *
 * @return string
 */
function events_path(Event $event)
{
    return $event->zip . "/" . $event->slug;
}
