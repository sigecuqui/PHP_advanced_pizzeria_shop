<?php


namespace App\Controllers;


use App\Abstracts\Controller;
use App\App;
use Core\FileDB;

class InstallController
{
    public function install()
    {
        App::$db = new FileDB(DB_FILE);

        App::$db->createTable('users');
        App::$db->insertRow('users', ['email' => 'admin@admin.lt', 'password' => 'as', 'role' => 'admin']);

        App::$db->createTable('pizzas');
    }
}