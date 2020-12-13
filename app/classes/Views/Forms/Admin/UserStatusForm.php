<?php


namespace App\Views\Forms\Admin;


use Core\Views\Form;

class UserStatusForm extends Form
{
    /**
     * UserStatusForm constructor. Regulate which info contains form
     *
     * @param null $value
     * @param null $id
     */
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
