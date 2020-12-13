<?php

namespace App\Controllers\Admin;

use App\App;
use App\Controllers\Base\AuthController;
use App\Views\BasePage;
use App\Views\Content\ChangeContent;
use App\Views\Forms\Admin\AddForm;

class AddController extends AuthController
{
    protected AddForm $form;
    protected BasePage $page;
    protected ChangeContent $change_content;

    public function __construct()
    {
        parent::__construct();

        $this->form = new AddForm();

        $this->page = new BasePage([
            'title' => 'ADD',
        ]);
    }

    public function add(): ?string
    {

        if ($this->form->validate()) {
            $clean_inputs = $this->form->values();
            App::$db->insertRow('pizzas', $clean_inputs);
        }

        $this->change_content = new ChangeContent([
            'title' => 'ADD',
            'form' => $this->form->render(),
        ]);

        $this->page->setContent($this->change_content->render());

        return $this->page->render();
    }
}