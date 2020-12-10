<?php


namespace App\Controllers;

use App\App;

class LogoutController
{
    function logout(): ?string
    {
        App::$session->logout('/login');
    }
}