<?php

/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 9/14/2015
 * Time: 12:59 PM
 */
class dbConn
{
    private $dbName = 'dt_picker';
    private $dbPass = '';
    private $dbUser = 'root';
    private $dbHost = 'localhost';
    public $dbConn;

    function connect() {
        try {
            $this->dbConn = new PDO('mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName, $this->dbUser, $this->dbPass);
            // set the PDO error mode to exception
            $this->dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->dbConn;


        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

    }
}

