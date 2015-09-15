<?php

/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 9/14/2015
 * Time: 1:54 PM
 */
include_once 'DbConn.php';
include_once 'GetUsers.php';
class insertUser
{

        function __construct(){
        $userName = $_GET['userInput'];
        try {
        $conn = new DbConn();
        $link = $conn->connect();
        $stmt = $link->prepare("INSERT INTO users (name)VALUES (:user)");
        $stmt->execute(array(':user' => $userName));
        $numOfRows = $stmt->rowCount();
        if ($numOfRows == 1) {

                $listOfUsers=new getUsers();
                } else {
                  echo 'Unos neuspesan...';
        }

        } catch (PDOException $e) {
            die("An error has occurred! " . $e->getMessage());
        }
}}