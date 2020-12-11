<?php


namespace App\Views\Forms\Admin;

use Core\Views\Form;

class DiscountForm extends Form
{
    public function __construct($pizza_id = null)
    {
        parent::__construct([
            'attr' => [
                'method' => 'POST'
            ],
            'fields' => [
                'pizza_id' => [
                    'label' => 'PRODUCT TITLE',
                    'type' => 'select',
                    'options' => $pizza_id,
                    'value' => '',
                    'validators' => [
                        'validate_select'
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'PIZZA TITLE',
                            'class' => 'input-field'
                        ]
                    ]
                ],
                'price' => [
                    'label' => 'PRICE',
                    'type' => 'number',
                    'value' => '',
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_is_numeric'
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'DISCOUNT PRICE',
                            'class' => 'input-field'
                        ]
                    ]
                ]
            ],
            'buttons' => [
                'submit' => [
                    'title' => 'SUBMIT',
                    'type' => 'submit',
                    'extra' => [
                        'attr' => [
                            'class' => 'btn'
                        ]
                    ]
                ]
            ]
        ]);
    }
}