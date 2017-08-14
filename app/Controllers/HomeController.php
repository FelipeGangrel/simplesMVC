<?php namespace App\Controllers;

use Libs\Controller;

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
        $this->view->render('home.teste');
    }

    public function outroTeste()
    {
        $this->view->render('home.outro_teste');
    }
}