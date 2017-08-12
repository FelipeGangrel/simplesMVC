<?php

require_once 'Libs/View.php';

class Controller
{   
    protected $view;
    
    public function __construct()
    {
        $this->view = new View();
    }

}