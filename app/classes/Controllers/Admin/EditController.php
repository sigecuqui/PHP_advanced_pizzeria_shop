<?php

namespace App\Controllers\Admin;

use App\App;
use App\Controllers\Base\AuthController;
use App\Views\BasePage;
use App\Views\Content\ChangeContent;
use App\Views\Forms\Admin\AddForm;

class EditController extends AuthController
{

    protected AddForm $form;
    protected BasePage $page;
    protected ChangeContent $change_content;

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

        $this->change_content = new ChangeContent([
            'title' => 'EDIT',
            'form' => $this->form->render()
        ]);

        $this->page->setContent($this->change_content->render());

        return $this->page->render();
    }
}