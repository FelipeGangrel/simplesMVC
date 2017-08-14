<?php namespace App\Controllers;

use Core\Controller;

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
        die(var_dump($param));
        $this->view->render('home.teste', compact('param'));
    }

    public function outroTeste()
    {
        $this->view->render('home.outro_teste');
    }
}