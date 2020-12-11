<?php

namespace App\Controllers\Admin\Discount;

use App\App;
use App\Controllers\Base\AuthController;
use App\Views\BasePage;
use App\Views\Forms\Admin\DiscountForm;
use Core\View;

class EditController extends AuthController
{
    protected DiscountForm $form;
    protected BasePage $page;

    public function __construct()
    {
        parent::__construct();
        $pizzas = App::$db->getRowsWhere('pizzas');

        foreach ($pizzas as $pizza_id => $pizza){
            $options[$pizza_id] = $pizza['name'];
        }
        $this->form = new DiscountForm($options);
        $this->page = new BasePage([
            'title' => 'EDIT DISCOUNT',
        ]);
    }

    public function index(): ?string
    {
        $row_id = $_GET['id'] ?? null;

        if ($row_id === null) {
            header('Location: /admin/discounts');
            exit();
        }

        $this->form->fill(App::$db->getRowById('discounts', $row_id));

        if ($this->form->validate()) {
            $clean_inputs = $this->form->values();

            App::$db->updateRow('discounts', $row_id, $clean_inputs);

            header('Location: /admin/discounts');
            exit();
        }

        $content = new View([
            'title' => 'EDIT DISCOUNT',
            'form' => $this->form->render(),
        ]);

        $this->page->setContent($content->render(ROOT . '/app/templates/content/forms.tpl.php'));

        return $this->page->render();
    }


}