<?php

namespace App\Controllers\Admin\Discount;

use App\App;
use App\Controllers\Base\AuthController;
use App\Views\BasePage;
use App\Views\Content\ChangeContent;
use App\Views\Forms\Admin\DiscountForm;

class AddController extends AuthController
{
    protected DiscountForm $form;
    protected BasePage $page;
    protected ChangeContent $change_content;

    /**
     * AddPizzaController constructor. Add discounts
     */
    public function __construct()
    {
        parent::__construct();
        $pizzas = App::$db->getRowsWhere('pizzas');

        foreach ($pizzas as $pizza_id => $pizza) {
            $options[$pizza_id] = $pizza['name'];
        }
        $this->form = new DiscountForm($options);

        $this->page = new BasePage([
            'title' => 'ADD DISCOUNT',
        ]);
    }

    /**
     * Add pizza discount
     *
     * @return string|null
     * @throws \Exception
     */
    public function index(): ?string
    {
        if ($this->form->validate()) {
            $clean_inputs = $this->form->values();
            $discount = App::$db->getRowWhere('discounts', ['pizza_id' => $clean_inputs['pizza_id']]);

            if (!$discount) {
                App::$db->insertRow('discounts', $clean_inputs);

                $message = 'YOU ADDED DISCOUNT';
            } else {
                $message = 'DISCOUNT ALREADY EXISTS';
            }
        }

        $this->change_content = new ChangeContent([
            'title' => 'ADD',
            'form' => $this->form->render(),
            'message' => $message ?? null
        ]);

        $this->page->setContent($this->change_content->render(ROOT . '/app/templates/content/forms.tpl.php'));

        return $this->page->render();
    }

}