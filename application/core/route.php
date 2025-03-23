<?php

class Route
{
    public static function start()
    {
        // контроллер и действие по умолчанию
        $controller_name = "home";
        $action_name = "index";

        $routes = explode("/", explode("?", $_SERVER["REQUEST_URI"])[0]);

        // получаем имя контроллера
        if (!empty($routes[1])) {
            $controller_name = $routes[1];
        }

        // получаем имя экшена
        if (!empty($routes[2])) {
            $action_name = $routes[2];
        }

        // Проверяем закрыт ли сайт
        require_once "config.php";
        if (_maintenanceMode && !isset($_GET["dev"])) {
            $controller_name = "maintenance";
            $action_name = "index";
        }

        // добавляем префиксы
        $model_name = "Model_" . $controller_name;
        $controller_name = "Controller_" . $controller_name;
        $action_name = "action_" . $action_name;

        // подцепляем файл с классом контроллера
        $controller_file = strtolower($controller_name) . ".php";
        $controller_path = "application/controllers/" . $controller_file;
        if (file_exists($controller_path) || isset($_GET["dev"])) {
            require $controller_path;
        }
        else {
            // Правильно было бы кинуть здесь исключение, но для упрощения сразу сделаем редирект на страницу 404
            Route::ErrorPage404();
        }

        // Подцепляем файл с классом модели (файла модели может и не быть)
        $model_file = strtolower($model_name) . ".php";
        $model_path = "application/models/" . $model_file;
        if (file_exists($model_path)) {
            require $model_path;
        }

        // Создаем контроллер
        $controller = new $controller_name;
        $action = $action_name;

        // Все что идет после контроллера и экшена - параметры
        $action_parameters = $routes;
        array_splice($action_parameters, 0, 3);

        if (method_exists($controller, $action) || isset($_GET["dev"])) {
            // Вызываем действие контроллера
            $controller->$action($action_parameters);
        }
        else {
            // Здесь также разумнее было бы кинуть исключение
            Route::ErrorPage404();
        }
    }

    private static function ErrorPage404()
    {
        header("HTTP/1.1 404 Not Found");
        // header("Status: 404 Not Found"); // Not working on reg.ru
        header("Location: /error/404");
    }
}