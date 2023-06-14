<?php

namespace app\App\core;

class Session
{
    public function __construct()
    {
        session_start();


    }

    public function setFlash($key, $message)
    {
        if (isset($_SESSION['flash'][$key])) {
            unset($_SESSION['flash'][$key]);
        }
        $_SESSION['flash'][$key] = $message;
    }

}