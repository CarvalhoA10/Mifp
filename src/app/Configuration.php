<?php

class Configuration
{

    private $DATABASE = "mysql";
    private $DB_URL = "localhost";
    private $DB_NAME = "test";
    private $DB_USERNAME = "root";
    private $DB_PASSWORD = "12345";

    private $migrations = ["UserMigration"];

    public function get_database()
    {
        return $this->DATABASE.':host='.$this->DB_URL.';dbname='.$this->DB_NAME;
    }

    public function get_dbusername()
    {
        return $this->DB_USERNAME;
    }

    public function get_dbpassword()
    {
        return $this->DB_PASSWORD;
    }

    public function get_migrations()
    {
        return $this->migrations;
    }
}