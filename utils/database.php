<?php

require_once '../config/config.php';

class Database{
    private $connection;

    public function __construct(){
        $this->connect();
    }

    private function connect(){

        try{
            $this->connection = new sqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        } catch (Exception $e){
            throw new Exception($e->getMessage());
        }
    }


}