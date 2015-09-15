<?php

/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 9/14/2015
 * Time: 12:57 PM
 */
include_once'DbConn.php';

class getUsers
{

    public $usersResolt;
    public $lastUser;

    function __construct()
    {
        try {
            $conn = new DbConn();
            $link = $conn->connect();
            $stmt = $link->prepare("SELECT * FROM users");
            $stmt->execute();
            $resolt = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->usersResolt = $resolt;
            $this->lastUser = end($resolt);

        } catch (PDOException $e) {
            die("An error has occurred! " . $e->getMessage());
        }


    }
}



