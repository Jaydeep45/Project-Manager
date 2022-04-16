<?php

class Connection {
    public static function connect() {
        $db_host = "localhost";
        $db_username = "root";
        $db_password = '';
        $db_table = 'project_manager';
        try {
            $con = new PDO("mysql:host={$db_host};dbname={$db_table}", $db_username, $db_password);
        }
        catch(PDOException $e) {
            exit($e);
        }
        return $con;
    }
}