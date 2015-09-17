<?php

/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 9/14/2015
 * Time: 1:54 PM
 */

include 'autoload/boot.php';
class InsertUser{

        public $numOfRows;
        public $lastUserAdded;

        function __construct(){
        $userName = $_GET['newUserNameInput'];
        try {
                $conn = new DbConn();
                $link = $conn->connect();
                $stmt = $link->prepare("INSERT INTO users (name) VALUES (:user)");
                $stmt->execute(array(':user' => $userName));
                $this->response();


        } catch (PDOException $e) {
                $error=new Error();
                $error->insertUserFail();

                }
        }

        function response()
        {

                $response = new Response();
                $response->insertUser();

        }


}

