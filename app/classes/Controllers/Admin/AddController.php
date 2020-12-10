<?php

namespace App\Controllers\Admin;

use App\App;

use App\Views\BasePage;
use App\Views\Forms\Admin\AddForm;
use App\Controllers\Base\AuthController;

class AddController extends AuthController
{
    protected $form;
    protected $page;

    public function __construct()
    {
        parent::__construct();
        $this->form = new AddForm();
        $this->page = new BasePage([
            'title' => 'ADD'
        ]);
    }

    public function add(): ?string
    {

        if ($this->form->validate()) {
            $clean_inputs = $this->form->values();
            $email = $_SESSION['email'];
            App::$db->insertRow('pizzas', $clean_inputs + ['email' => $email]);
        }

        $this->page->setContent($this->form->render());

        return $this->page->render();
    }
}