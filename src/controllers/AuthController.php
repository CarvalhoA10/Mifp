<?php

require_once './src/app/Controller.php';

class AuthController extends Controller
{

    public function __construct()
    {
        
    }

    public function register()
    {

        return $this->view("auth/register", "Registrar");

    }
}