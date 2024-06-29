<?php

class Configuration
{

    private $DATABASE = "mysql";
    private $DB_URL = "";
    private $DB_NAME = "";
    private $DB_USERNAME = "";
    private $DB_PASSWORD = "";

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
}