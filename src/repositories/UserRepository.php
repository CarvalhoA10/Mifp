<?php

require_once './src/app/Database.php';
require_once './src/helpers/Role.php';

class UserRepository
{

    private $database;

    public function __construct()
    {
        $this->database = new Database;
    }

    public function create($username, $email, $password)
    {

        $conn = $this->database->connection();

        $sql = "INSERT INTO users (username, email, password, isActive, role, joinedDate, lastUpdate)
            VALUES (:username, :email, :password, :isActive, :role, :joinedDate, :lastUpdate);";

        $now = new DateTime();

        $prep = $conn->prepare($sql);
        $prep->bindValue(':username', $username);
        $prep->bindValue(':email', $email);
        $prep->bindValue(':password', password_hash($password, PASSWORD_DEFAULT));
        $prep->bindValue(':isActive', false, PDO::PARAM_BOOL);
        $prep->bindValue(':role', Role::basic);
        $prep->bindValue(':joinedDate', $now->format('Y-m-d H:i:s'));
        $prep->bindValue(':lastUpdate', $now->format('Y-m-d H:i:s'));

        $prep->execute();

    }

    public function getById($id)
    {
        
    }

}