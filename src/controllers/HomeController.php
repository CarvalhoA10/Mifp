<?php

require './src/Controller.php';

class HomeController extends Controller
{

    public function __construct()
    {
        
    }

    public function home()
    {

        return $this->view("public/home", "home");
    }

    public function about()
    {
        return $this->view("public/about", "Sobre o site");
    }

}