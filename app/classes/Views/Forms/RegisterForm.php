<?php

namespace App\Views\Forms;


use Core\Views\Form;

class RegisterForm extends Form
{
public function __construct()
{
    parent::__construct([
        'attr' => [
            'method' => 'POST',
        ],
        'fields' => [
            'name' => [
                'label' => 'NAME',
                'type' => 'text',
                'validators' => [
                    'validate_field_not_empty',
                ],
                'extra' => [
                    'attr' => [
                        'placeholder' => 'ENTER YOUR NAME',
                        'class' => 'input-field',
                    ]
                ]
            ],
            'email' => [
                'label' => 'EMAIL',
                'type' => 'text',
                'validators' => [
                    'validate_field_not_empty',
                    'validate_email',
                    'validate_user_unique',
                ],
                'extra' => [
                    'attr' => [
                        'placeholder' => 'ENTER EMAIL',
                        'class' => 'input-field',
                    ]
                ]
            ],
            'password' => [
                'label' => 'PASSWORD',
                'type' => 'text',
                'validators' => [
                    'validate_field_not_empty',
                ],
                'extra' => [
                    'attr' => [
                        'placeholder' => 'ENTER PASSWORD',
                        'class' => 'input-field',
                    ]
                ]
            ],
            'password_repeat' => [
                'label' => 'PASSWORD REPEAT',
                'type' => 'text',
                'validators' => [
                    'validate_field_not_empty',
                ],
                'extra' => [
                    'attr' => [
                        'placeholder' => 'REPEAT PASSWORD',
                        'class' => 'input-field',
                    ]
                ]
            ],
        ],
        'buttons' => [
            'send' => [
                'title' => 'REGISTER',
                'type' => 'submit',
                'extra' => [
                    'attr' => [
                        'class' => 'btn',
                    ]
                ]
            ]
        ],
        'validators' => [
            'validate_fields_match' => [
                'password',
                'password_repeat'
            ]
        ]
    ]);
}
}