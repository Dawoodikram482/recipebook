<?php

namespace config;
class dbconfig
{
    private $servername = 'mysql';
    private $username = 'dawood';
    private $password = 'secret';
    private $database = 'recipebookdb';

    public function connect()
    {
        try {
            $conn = new \PDO("mysql:host=$this->servername;dbname=$this->database", $this->username, $this->password);
            $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
?>