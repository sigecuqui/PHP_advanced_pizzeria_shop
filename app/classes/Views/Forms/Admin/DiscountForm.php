<?php


namespace App\Views\Forms\Admin;

use Core\Views\Form;

class DiscountForm extends Form
{
    /**
     * DiscountForm constructor. Regulate which info contains form
     *
     * @param null $options
     */
    public function __construct($options = null)
    {
        parent::__construct([
            'attr' => [
                'method' => 'POST'
            ],
            'fields' => [
                'pizza_id' => [
                    'label' => 'PRODUCT TITLE',
                    'type' => 'select',
                    'options' => $options,
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
                    'type' => 'text',
                    'value' => '',
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_numeric',
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
            ],
            'validators' => [
                'validate_lower_number'
            ]
        ]);
    }
}