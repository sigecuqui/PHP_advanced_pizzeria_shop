<?php

namespace App\Views\Forms\Admin;

use Core\Views\Form;

class RoleForm extends Form
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
                'role' => [
                    'type' => 'select',
                    'options' => [
                        'admin' => 'ADMIN',
                        'user' => 'USER'
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