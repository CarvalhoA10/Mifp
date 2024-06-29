<?php

class Routes
{

    public static function routes()
    {
        return [
            'get' => [
                '/' => fn() => self::execute_controller("HomeController", "home"),
                '/about' => fn() => self::execute_controller("HomeController", "about"),
            ],
            'post' => [
                '/register' => fn() => self::execute_controller("AuthController", "register"),
                '/login' => fn() => self::execute_controller("AuthController", "login"),
            ]
        ];
    }

    public static function execute_controller($controller, $action)
    {
        require './src/controllers/'.$controller.'.php';
        $instance = new $controller;
        $instance->$action();
    }

    public static function execute()
    {

        $routes = self::routes();
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        $uri = parse_url($_SERVER['REQUEST_URI'])['path'];

        if(!isset($method, $routes))
        {
            die('A requisição não pode ser continuada');
        }

        if(!array_key_exists($uri, $routes[$method]))
        {
            die('A requisição não pode ser continuada');
        }

        $routes[$method][$uri]();
    }

}