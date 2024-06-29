<?php

require_once 'src/app/routes.php';

session_start();

$routes = new Routes();

$routes->execute();