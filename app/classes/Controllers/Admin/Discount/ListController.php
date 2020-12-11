<?php

namespace App\Controllers\Admin\Discount;

use App\App;
use App\Controllers\Base\AuthController;
use App\Views\BasePage;
use App\Views\Forms\Admin\DeleteForm;
use App\Views\Forms\Admin\DiscountTable;
use Core\Views\Form;

class ListController extends AuthController
{
    protected DeleteForm $form;
    protected BasePage $page;

    public function __construct()
    {
        parent::__construct();
        $this->form = new DeleteForm();
        $this->page = new BasePage([
            'title' => 'DISCOUNTS',
        ]);
    }

    public function index(): ?string
    {
        if (Form::action()) {
            if ($this->form->validate()) {
                $clean_inputs = $this->form->values();

                App::$db->deleteRow('discounts', $clean_inputs['id']);
            }
        }

        $table = new DiscountTable();

        $this->page->setContent($table->render());

        return $this->page->render();
    }

}