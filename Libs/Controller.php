<?php namespace Libs;

class Controller
{   
    protected $view;
    
    public function __construct()
    {
        $this->view = new View();
    }

}