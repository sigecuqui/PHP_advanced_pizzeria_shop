<?php


namespace App\Views\Content;


use Core\View;

class ChangeContent extends View
{
    /**
     * ChangeContent constructor.
     *
     * @param $data
     */
    public function __construct($data)
    {
        parent::__construct($data + [
                'message' => null
            ]);
    }

    /**
     * Changing form content
     *
     * @param string $template_path
     * @return false|string
     * @throws \Exception
     */
    public function render($template_path = ROOT . '/app/templates/content/forms.tpl.php')
    {
        return parent::render($template_path);
    }
}
