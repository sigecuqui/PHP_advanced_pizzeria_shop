<?php

namespace App\Views\Forms\Admin;

use App\App;
use Core\Views\Table;

class UsersTable extends Table
{
    protected RoleForm $form;

    /**
     * UsersTable constructor. Show and regulate info about users
     *
     * @throws \Exception
     */
    public function __construct()
    {
        $this->form = new RoleForm();
        $rows = App::$db->getRowsWhere('users');

        foreach ($rows as $id => &$row) {
            $row['id'] = $id;
            $row['username'] = $row['name'];

            $roleForm = new RoleForm($row['role'], $row['id']);
            $rows[$id]['role_form'] = $roleForm->render();

            if ($row['email'] === $_SESSION['email']) {
                unset($row['role_form']);
            }

            unset($row['email'], $row['password'], $row['role'], $row['name']);
        }

        /**
         * Information table
         */
        parent::__construct([
            'headers' => [
                'ID',
                'NAME',
                'ROLE',
            ],
            'rows' => $rows
        ]);
    }

}