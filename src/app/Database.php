<?php

require_once './src/app/Configuration.php';

class Database
{

    private $configuration;

    public function __construct()
    {
        $this->configuration = new Configuration;
    }

    public function connection()
    {

        try
        {
            $conn = new PDO($this->configuration->get_database(), $this->configuration->get_dbusername(), $this->configuration->get_dbpassword());
            return $conn;
        }
        catch(PDOException $ex)
        {
            die("Connection error: " . $ex->getMessage());
        }
    }

    public function execute_migrations()
    {
        foreach($this->configuration->get_migrations() as $migration)
        {
            require_once './src/migrations/'.$migration.'.php';

            new $migration;
        }
    }
}