<?php

require_once './src/app/Database.php';

class UserMigration
{

    private $database;

    public function __construct()
    {
        $this->database = new Database;

        $this->create_user_table();
        $this->create_validate_email_table();
        $this->create_recovery_password_table();
    }

    public function create_user_table()
    {

        $conn = $this->database->connection();
        $sql = "
        
            CREATE TABLE IF NOT EXISTS users(
            
                id INT PRIMARY KEY AUTO_INCREMENT,
                username VARCHAR(30) UNIQUE NOT NULL,
                email VARCHAR(150) UNIQUE NOT NULL,
                password VARCHAR(150) NOT NULL,
                isActive INT,
                role INT,
                joinedDate DateTime,
                lastUpdate DateTIme

            );
        
        ";

        $prep = $conn->prepare($sql);
        $prep->execute();
    }

    public function create_validate_email_table()
    {
        $conn = $this->database->connection();
        $sql = "
        
            CREATE TABLE IF NOT EXISTS validate_email(
            
                id INT PRIMARY KEY AUTO_INCREMENT,
                userId INT NOT NULL,
                token VARCHAR(150) NOT NULL,
                createdAt DateTime,
                lastUpdate DateTIme,

                CONSTRAINT fk_user_v FOREIGN KEY(userId) REFERENCES users(id)

            );
        
        ";

        $prep = $conn->prepare($sql);
        $prep->execute();
    }

    public function create_recovery_password_table()
    {
        $conn = $this->database->connection();
        $sql = "
        
            CREATE TABLE IF NOT EXISTS recovery_password(
            
                id INT PRIMARY KEY AUTO_INCREMENT,
                userId INT NOT NULL,
                token VARCHAR(150) NOT NULL,
                createdAt DateTime,
                lastUpdate DateTIme,

                CONSTRAINT fk_user_r FOREIGN KEY(userId) REFERENCES users(id)

            );
        
        ";

        $prep = $conn->prepare($sql);
        $prep->execute();
    }

}