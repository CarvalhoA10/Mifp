<?php

require_once 'src/routes.php';

session_start();

$routes = new Routes();

$routes->execute();