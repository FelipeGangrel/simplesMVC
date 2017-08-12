<?php

require 'Libs/Controller.php';

class HomeController extends Controller
{
    public function index()
    {   
        $frutas = [
            'laranja',
            'melão',
            'goiaba',
            'jambo',
        ];

        $this->view->render('home.home', compact('frutas'));
    }

    public function teste($param = null)
    {
        echo "apenas um teste! $param";
    }
}