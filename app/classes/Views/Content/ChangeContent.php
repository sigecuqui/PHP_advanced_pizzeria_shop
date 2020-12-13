<?php


namespace App\Views\Content;


use Core\View;

class ChangeContent extends View
{
    public function __construct($data)
    {
        parent::__construct($data + [
                'message' => null
            ]);
    }

    public function render($template_path = ROOT . '/app/templates/content/forms.tpl.php')
    {
        return parent::render($template_path);
    }
}
