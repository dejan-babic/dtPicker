<?php

/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 9/14/2015
 * Time: 1:54 PM
 */

include 'autoload/boot.php';
class InsertUser{

        public $userInput;
        public $numOfRows;


        function __construct(){

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $this->userInput = $_GET['newUserNameInput'];
            } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $this->userInput = $_POST['newUserNameInput'];
            }

        try {
                $conn = new DbConn();
                $link = $conn->connect();
                $stmt = $link->prepare("INSERT INTO users (name) VALUES (:user)");
                $stmt->execute(array(':user' => $this->userInput));
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

