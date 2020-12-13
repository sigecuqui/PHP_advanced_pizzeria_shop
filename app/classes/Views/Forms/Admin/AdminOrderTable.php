<?php


namespace App\Views\Forms\Admin;


use App\App;
use App\Views\Content\TimeStamp;
use App\Views\Forms\Admin\UserStatusForm;
use Core\Views\Table;

class AdminOrderTable extends Table
{
    protected UserStatusForm $form;

    /**
     * AdminOrderTable constructor. Regulate what to do with an order
     *
     * @throws \Exception
     */
    public function __construct()
    {
        $this->form = new UserStatusForm();
        /**
         * All orders
         */
        $rows = App::$db->getRowsWhere('orders');

        foreach ($rows as $id => &$row) {
            /**
             * Order by unique user
             */
            $user = App::$db->getRowWhere('users', ['email' => $row['email']]);
            $row['full_name'] = $user['name'];

            // Order timestamp logic

            $timeStamp = date('Y-m-d H:i:s', $row['timestamp']);
            $difference = abs(strtotime('now') - strtotime($timeStamp));

            $days = floor($difference / (3600 * 24));
            $hours = floor($difference / 3600);
            $minutes = floor(($difference - ($hours * 3600)) / 60);

            $result = "{$days} days {$hours}:{$minutes} hours";

            $row['timestamp'] = $result;
            ///

            $statusForm = new UserStatusForm($row['status'], $id);
            $rows[$id]['role_form'] = $statusForm->render();
            unset($row['email'], $row['status']);
        }

        /**
         * Construct a table with orders information
         */
        parent::__construct([
            'headers' => [
                'ID',
                'PIZZA TITLE',
                'TIME AGO',
                'USER NAME',
                'STATUS'
            ],
            'rows' => $rows
        ]);
    }

}
