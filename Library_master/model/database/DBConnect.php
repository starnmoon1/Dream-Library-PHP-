<?php

class DBConnect
{
    private $dsn;
    private $username;
    private $password;

    public function __construct()
    {
        $this->dsn = "mysql:host=localhost;dbname=Manage_Library;charset=utf8";
        $this->username = "root";
        $this->password = "password";
    }

    public function connect()
    {
        $conn = null;
        try {
            $conn = new PDO($this->dsn, $this->username, $this->password);
        }catch (PDOException $e){
            echo $e->getMessage();
        }
        return $conn;
    }
}

?>