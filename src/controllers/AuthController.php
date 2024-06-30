<?php

class AuthController
{

    public function __construct()
    {
        
    }

    public function register()
    {

        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

    }
}