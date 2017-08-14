<?php namespace App\Controllers;

use Libs\Controller;

class ErrorController extends Controller
{
    public function showError($message)
    {   
        $message = $message;
        $this->view->render('error.error', compact('message'));
    }
}