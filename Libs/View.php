<?php

class View{

    protected $content;
    protected $viewName;

    public function render(string $viewName, $content = null)
    {   
        $this->viewName = "Views/".str_replace(".","/",$viewName).".phtml";
        $this->content = $content;
        require($this->viewName);
    }

}