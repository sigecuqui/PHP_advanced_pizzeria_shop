<?php

namespace App\Views\Forms\Admin;

use Core\Views\Form;

class AddForm extends Form
{
    /**
     * AddForm constructor. Regulate which info contains form
     */
    public function __construct()
    {
        parent::__construct([
            'attr' => [
                'method' => 'POST',
            ],
            'fields' => [
                'name' => [
                    'label' => 'ITEM',
                    'type' => 'text',
                    'value' => '',
                    'validators' => [
                        'validate_field_not_empty',
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'ENTER PIZZA\'S TITLE',
                            'class' => 'input-field',
                        ],
                    ],
                ],
                'price' => [
                    'label' => 'PRICE',
                    'type' => 'text',
                    'value' => '',
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_numeric',
                        'validate_field_range' => [
                            'min' => 1,
                            'max' => 9999,
                        ]
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'ENTER ITEM\'S PRICE',
                            'class' => 'input-field',
                        ],
                    ],
                ],
                'image' => [
                    'label' => 'IMAGE URL',
                    'type' => 'text',
                    'value' => '',
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_url',
                    ],
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'ENTER ITEM\'S IMAGE URL',
                            'class' => 'input-field',
                        ],
                    ],
                ],
            ],
            'buttons' => [
                'submit' => [
                    'title' => 'ADD',
                    'type' => 'submit',
                    'extra' => [
                        'attr' => [
                            'class' => 'btn',
                        ],
                    ],
                ],
            ],
        ]);
    }


}