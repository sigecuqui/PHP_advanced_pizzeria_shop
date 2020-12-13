<?php

namespace App\Controllers\Admin;

use App\App;
use App\Controllers\Base\AuthController;
use App\Views\BasePage;
use App\Views\Content\ChangeContent;
use App\Views\Forms\Admin\AddForm;

class AddPizzaController extends AuthController
{
    protected AddForm $form;
    protected BasePage $page;
    protected ChangeContent $change_content;

    /**
     * AddPizzaController constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->form = new AddForm();

        $this->page = new BasePage([
            'title' => 'ADD',
        ]);
    }

    /**
     * Add pizza to the list
     *
     * @return string|null
     * @throws \Exception
     */
    public function add(): ?string
    {

        if ($this->form->validate()) {
            $clean_inputs = $this->form->values();
            App::$db->insertRow('pizzas', $clean_inputs);
        }

        //Add form
        $this->change_content = new ChangeContent([
            'title' => 'ADD',
            'form' => $this->form->render(),
        ]);

        $this->page->setContent($this->change_content->render());

        return $this->page->render();
    }
}