<?php

class Controller_Default extends Controller
{
    public function __construct()
    {
        $this->view = new View();
        $this->model = new Model_Default();
    }

    public function action_index()
    {
        $this->view->generate("view_default.php");
    }
}