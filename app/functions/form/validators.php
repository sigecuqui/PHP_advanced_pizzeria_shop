<?php

use App\App;

/**
 *
 * Checks if user(data) already exists in our saved file.
 *
 * If there is no such data(user) returns true.
 * If the data already exist in file, writes an error and returns false.
 *
 * @param string $field_input - clean input value
 * @param array $field - input array
 * @return bool
 */
function validate_user_unique(string $field_input, array &$field): bool
{
    if (App::$db->getRowWhere('users', ['email' => $field_input])) {
        $field['error'] = 'User already exists';

        return false;
    }

    return true;
}

/**
 *
 *Checks if there is such email and password in the database.
 *
 * If there is such user and password is the same as in database returns true.
 * If email or password of $filtered_input are not in the database(or not the same),
 * writes an error and returns false.
 *
 * @param array $filtered_input - clean inputs array with values
 * @param array $form - form array
 * @return bool
 */
function validate_login(array $filtered_input, array &$form): bool
{
    if (App::$db->getRowWhere('users', [
        'email' => $filtered_input['email'],
        'password' => $filtered_input['password']
    ])) {
        return true;
    }

    $form['error'] = 'Incorrect';

    return false;
}

/**
 * Used for deletion, checks if the fields value exists in database.
 *
 * @param string $field_input
 * @param array $field
 * @return bool
 */
function validate_row_exists(string $field_input, array &$field): bool
{
    if (App::$db->rowExists('pizzas', $field_input)) {
        return true;
    }

    $field['error'] = 'This row doesnt exist';

    return false;
}

/**
 * Checks if written discount is not higher, when original price in the database
 *
 * @param array $filtered_input
 * @param array $form
 * @return bool
 */
function validate_lower_number(array $filtered_input, array &$form): bool
{
    $pizzas = App::$db->getRowsWhere('pizzas');
    foreach ($pizzas as $pizza_id => $pizza) {
        if ($filtered_input['pizza_id'] == $pizza_id) {
            $filtered_input['pizza_id'] = $pizza['name'];
        }
    }
    $selected_pizza = App::$db->getRowWhere('pizzas', ['name' => $filtered_input['pizza_id']]);

    if ($selected_pizza['price'] <= $filtered_input['price']) {
        $form['error'] = 'CHOOSE A LOWER PRICE';

        return false;
    }

    return true;
}