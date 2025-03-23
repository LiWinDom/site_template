<?php

class Controller_Error extends Controller
{
    public function __construct()
    {
        $this->view = new View();
    }

    public function action_index()
    {
        header("Location: ../");
    }

    public function action_404()
    {
        $this->view->generate('view_error_404.php');
    }
}