<?php
/**
 * Created by PhpStorm.
 * User: Jonbrobinson
 * Date: 3/22/16
 * Time: 9:13 PM
 */


public function flash($message)
{
    session()->flash('flash_message', $message);
}