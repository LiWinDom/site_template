<?php
class View
{
    function generate($content_view, $data = null)
    {
        $this->generate_template($content_view, "view_template_navbar.php", $data);
    }

    function generate_template($content_view, $template_view, $data = null)
    {
        /*
        if(is_array($data)) {
            // преобразуем элементы массива в переменные
            extract($data);
        }
        */

        // Для более удобной работы
        if (substr($content_view, 0, 5) != "view_") {
            $content_view = "view_" . $content_view;
        }
        if (substr($content_view, strlen($content_view) - 4, 4) != ".php") {
            $content_view .= ".php";
        }

        require_once "application/views/" . $template_view;
    }
}