<?php

class Controller_Theme extends Controller
{
    private function return_back() {
        $url = $_SERVER["HTTP_REFERER"] ?? "/";
        header("Location: " . $url);
        exit();
    }

    public function action_dark()
    {
        setcookie("theme", "dark", 2147483647, "/");
        $this->return_back();
    }

    public function action_dark_monochrome()
    {
        setcookie("theme", "dark_monochrome", 2147483647, "/");
        $this->return_back();
    }

    public function action_light()
    {
        setcookie("theme", "light", 2147483647, "/");
        $this->return_back();
    }

    public function action_light_monochrome()
    {
        setcookie("theme", "light_monochrome", 2147483647, "/");
        $this->return_back();
    }
}