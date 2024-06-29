<?php

require './src/app/Configuration.php';

class DATABASE
{

    private $connection;

    public function __construct()
    {
        $this->connection = new Configuration;
    }

    public function connection()
    {

        try
        {
            $conn = new PDO($this->connection->get_database(), $this->connection->get_dbusername(), $this->connection->get_dbpassword());

            return $conn;
        }
        catch(PDOException $ex)
        {
            die("Connection error: " . $ex->getMessage());
        }
    }

    private function execute_migrations()
    {

    }
}