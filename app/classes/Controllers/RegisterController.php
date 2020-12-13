<?php


namespace App\Controllers;

use App\App;
use App\Controllers\Base\GuestController;
use App\Views\BasePage;
use App\Views\Content\ChangeContent;
use App\Views\Forms\RegisterForm;

class RegisterController extends GuestController
{
    protected RegisterForm $form;
    protected BasePage $page;
    protected ChangeContent $change_content;

    public function __construct()
    {
        parent::__construct();
        $this->form = new RegisterForm();
        $this->change_content = new ChangeContent([
            'title' => 'Register',
            'form' => $this->form->render()
        ]);
        $this->page = new BasePage([
            'title' => 'REGISTER'
        ]);
    }

    public function register(): ?string
    {

        if ($this->form->validate()) {
            $clean_inputs = $this->form->values();

            unset($clean_inputs['password_repeat']);

            App::$db->insertRow('users', $clean_inputs + ['role' => 'user']);

            header('Location: /login');
        }

        $this->page->setContent($this->form->render());

        return $this->page->render();
    }
}