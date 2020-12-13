<?php

namespace App\Controllers\User;

use App\Controllers\Base\UserController;
use App\Views\BasePage;
use App\Views\Forms\Admin\UserOrderTable;

class OrdersController extends UserController
{
    protected BasePage $page;

    /**
     * OrdersController constructor. Show information to user about his order
     */
    public function __construct()
    {
        parent::__construct();

        $this->page = new BasePage([
            'title' => 'ORDERS',
        ]);
    }

    public function index(): ?string
    {
        $table = new UserOrderTable();

        $this->page->setContent($table->render());

        return $this->page->render();
    }
}