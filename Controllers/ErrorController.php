<?php

require_once 'Libs/Controller.php';

class ErrorController extends Controller
{
    public function showError($message)
    {   
        $message = $message;
        $this->view->render('error.error', compact('message'));
    }
}