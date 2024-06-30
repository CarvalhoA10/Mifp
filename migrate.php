<?php

require_once './src/app/Database.php';
$migrate = new Database;

$migrate->execute_migrations();