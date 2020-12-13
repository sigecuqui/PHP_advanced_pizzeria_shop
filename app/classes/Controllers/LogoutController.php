<?php


namespace App\Controllers;

use App\App;

class LogoutController
{
    /**
     * Regulate logout
     *
     * @return string|null
     */
    function logout(): ?string
    {
        App::$session->logout('/login');
    }
}