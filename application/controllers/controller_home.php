<?php

class Controller_Home extends Controller
{
    public function __construct()
    {
        $this->view = new View();
    }

    public function action_index()
    {
        $this->view->generate("view_home.php");
    }
}