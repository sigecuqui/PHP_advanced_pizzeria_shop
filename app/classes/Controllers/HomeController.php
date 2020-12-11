<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\App;
use App\Views\BasePage;
use App\Views\Content\HomeContent;
use App\Views\Forms\Admin\DeleteForm;
use App\Views\Forms\Admin\OrderForm;
use Core\View;
use Core\Views\Link;

class HomeController extends Controller
{
    protected BasePage $page;
    protected $link;

    /**
     * Controller constructor.
     *
     * We can write logic common for all
     * other methods
     *
     * For example, create $page object,
     * set it's header/navigation
     * or check if user has a proper role
     *
     * Goal is to prepare $page
     */
    public function __construct()
    {
        $this->page = new BasePage([
            'title' => 'PYZERIE'
        ]);
    }

    /**
     * This method builds or sets
     * current $page content
     * renders it and returns HTML
     *
     * So if we have ex.: ProductsController,
     * it can have methods responsible for
     * index() (main page, usualy a list),
     * view() (preview single),
     * create() (form for creating),
     * edit() (form for editing)
     * delete()
     *
     * These methods can then be called on each page accordingly, ex.:
     * add.php:
     * $controller = new PixelsController();
     * print $controller->add();
     *
     *
     * my.php:
     * $controller = new ProductsController();
     * print $controller->my();
     *
     * @return string|null
     */
    function index(): ?string
    {
        $home_content = new HomeContent();

        $home_content->content();

        $rows = App::$db->getRowsWhere('pizzas');

        $url = App::$router::getUrl('edit');


        foreach ($rows as $id => &$row) {
            if (App::$session->getUser()) {
                if (App::$session->getUser()['role'] === 'admin') {
                    $this->link = new Link([
                        'link' => "{$url}?id={$id}",
                        'class' => 'link',
                        'text' => 'EDIT'
                    ]);

                    $row['link'] = $this->link->render();

                    $deleteForm = new DeleteForm($id);
                    $row['delete'] = $deleteForm->render();
                    $row['order'] = '';

                } elseif (App::$session->getUser()['role'] === 'user') {

                    $orderForm = new OrderForm($row['name']);
                    $row['order'] = $orderForm->render();
                    $row['link'] = '';
                    $row['delete'] = '';
                }
            } else {
                $row['order'] = '';
                $row['link'] = '';
                $row['delete'] = '';
            }
        }
        $content = new View([
            'title' => 'WELCUM TU PYZERIE',
            'redirect' => $home_content->redirect(),
            'discount' => $home_content->addDiscount(),
            'products' => $rows
        ]);

        $page = new BasePage([
            'title' => 'SHOP',
            'content' => $content->render(ROOT . '/app/templates/content/index.tpl.php')
        ]);

        return $page->render();
    }
}