<?php

namespace App\Http;

class Flash {

    /**
     * @param string $title
     * @param string $message
     * @param string $level
     * @param string $key
     *
     * @return mixed
     */
    public function create($title, $message, $level, $key = 'flash_message')
    {
        return session()->flash($key, [
            "title" => $title,
            "message" => $message,
            "level" => $level
        ]);
    }

    /**
     * @param string $title
     * @param string $message
     *
     * @return mixed
     */
    public function info($title, $message)
    {
        return $this->create($title, $message, 'info');
    }

    /**
     * @param string $title
     * @param string $message
     *
     * @return mixed
     */
    public function success($title, $message)
    {
        return $this->create($title, $message, 'success');
    }

    /**
     * @param string $title
     * @param string $message
     *
     * @return mixed
     */
    public function error($title, $message)
    {
        return $this->create($title, $message, 'error');
    }

    /**
     * @param string $title
     * @param string $message
     *
     * @return mixed
     */
    public function overlay($title, $message, $level = 'success')
    {
        return $this->create($title, $message, $level, 'flash_message_overlay');
    }
}