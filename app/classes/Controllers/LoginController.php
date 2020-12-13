<?php


namespace App\Controllers;

use App\App;
use App\Controllers\Base\GuestController;
use App\Views\BasePage;
use App\Views\Content\ChangeContent;
use App\Views\Forms\LoginForm;

class LoginController extends GuestController
{
    protected LoginForm $form;
    protected BasePage $page;
    protected ChangeContent $form_content;

    public function __construct()
    {
        parent::__construct();
        $this->form = new LoginForm();
        $this->page = new BasePage([
            'title' => 'LOGIN'
        ]);
        $this->change_content = new ChangeContent([
            'title' => 'LOGIN',
            'form' => $this->form->render()
        ]);
    }

    public function login(): ?string
    {
        if ($this->form->validate()) {
            $clean_inputs = $this->form->values();

            App::$session->login($clean_inputs['email'], $clean_inputs['password']);

            if (App::$session->getUser()) {
                header('Location: index');
                exit();
            }
        }

        $this->page->setContent($this->change_content->render());

        return $this->page->render();
    }

}