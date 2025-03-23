<?php

class Controller_Theme extends Controller
{
    public function action_dark()
    {
        setcookie("theme", "dark", 2147483647, "/");
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

    public function action_dark_monochrome()
    {
        setcookie("theme", "dark_monochrome", 2147483647, "/");
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

    public function action_light()
    {
        setcookie("theme", "light", 2147483647, "/");
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }

    public function action_light_monochrome()
    {
        setcookie("theme", "light_monochrome", 2147483647, "/");
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
}