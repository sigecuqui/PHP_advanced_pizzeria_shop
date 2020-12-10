<?php


namespace App\Views\Forms\Admin;


use Core\Views\Form;

class StatusForm extends Form
{
    public function __construct($value = null, $id = null)
    {
        parent::__construct([
            'attr' => [
                'method' => 'POST'
            ],
            'fields' => [
                'id' => [
                    'type' => 'hidden',
                    'value' => $id
                ],
                'status' => [
                    'type' => 'select',
                    'options' => [
                        'active' => 'ACTIVE',
                        'completed' => 'COMPLETED',
                        'cancelled' => 'CANCELLED'
                    ],
                    'validators' => [
                        'validate_select',
                    ],
                    'value' => $value,
                ]
            ],
            'buttons' => [
                'submit' => [
                    'title' => 'SET',
                    'type' => 'submit',
                    'extra' => [
                        'attr' => [
                            'class' => 'btn'
                        ]
                    ]
                ],
            ]
        ]);
    }

}
