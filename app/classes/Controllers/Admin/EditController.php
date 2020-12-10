<?php

namespace App\Controllers\Admin;

use App\App;
use App\Controllers\Base\AuthController;
use App\Views\BasePage;
use App\Views\Forms\Admin\AddForm;

class EditController extends AuthController
{
    protected $form;
    protected $page;

    public function __construct()
    {
        parent::__construct();
        $this->form = new AddForm();
        $this->page = new BasePage([
            'title' => 'EDIT'
        ]);
    }

    public function edit(): ?string
    {
        $row_id = $_GET['id'] ?? null;

        if ($row_id === null) {
            header('Location: /index');
            exit();
        }
        $this->form->fill(App::$db->getRowById('pizzas', $row_id));

        if ($this->form->validate()) {
            $clean_inputs = $this->form->values();
            App::$db->updateRow('pizzas', $row_id, $clean_inputs);
        }
        $this->page->setContent($this->form->render());

        return $this->page->render();
    }
}