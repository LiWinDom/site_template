<?php

class Controller_Maintenance extends Controller
{
    public function __construct()
    {
        $this->view = new View();
    }

    public function action_index()
    {
        $this->view->generate("view_maintenance.php");
    }
}