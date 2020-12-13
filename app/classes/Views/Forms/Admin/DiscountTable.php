<?php

namespace App\Views\Forms\Admin;

use App\App;
use Core\Views\Link;
use Core\Views\Table;

class DiscountTable extends Table
{
    /**
     * DiscountTable constructor. Show and regulate info about discounts
     *
     * @throws \Exception
     */
    public function __construct()
    {
        $rows = App::$db->getRowsWhere('discounts');
        $url = App::$router::getUrl('admin_discounts_edit');

        $pizzas = App::$db->getRowsWhere('pizzas');

        foreach ($pizzas as $pizza_id => $pizza) {
            $titles[$pizza_id] = $pizza['name'];
        }

        foreach ($rows as $id => $row) {
            $rows[$id]['id'] = $id;

            $rows[$id]['name'] = $titles[$rows[$id]['pizza_id']];
            $rows[$id]['discount_price'] = $rows[$id]['price'];

            $link = new Link([
                'link' => "{$url}?id={$id}",
                'class' => 'link',
                'text' => 'EDIT'
            ]);

            $rows[$id]['link'] = $link->render();

            $deleteForm = new DeleteForm($id);
            $rows[$id]['delete'] = $deleteForm->render();

            unset($rows[$id]['pizza_id'], $rows[$id]['price']);
        }

        parent::__construct([
            'headers' => [
                'ID',
                'PIZZA TITLE',
                'PRICE',
                'EDIT',
                'DELETE'
            ],
            'rows' => $rows
        ]);
    }

}