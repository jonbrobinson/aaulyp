<?php

function flash($title = null, $message = null)
{
    $flash = app('App\Http\flash');

    if (func_num_args() == 0) {
        return $flash;
    }

    return $flash->info($title, $message);
}
