<?php

/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 9/14/2015
 * Time: 1:54 PM
 */
include_once 'DbConn.php';
include_once 'GetUsers.php';
include_once'Response.php';
include_once'ErrorClass.php';
class insertUser{

        public $numOfRows;

        function __construct(){
        $userName = $_GET['newUserNameInput'];
        try {
        $conn = new DbConn();
        $link = $conn->connect();
        $stmt = $link->prepare("INSERT INTO users (name)VALUES (:user)");
        $stmt->execute(array(':user' => $userName));
        $this->numOfRows = $stmt->rowCount();
        $this->response();

        } catch (PDOException $e) {
                $error=new Error();
                $error->insertUserFail();

                }
        }

        function response()
        {
                if ($this->numOfRows == 1) {
                        $response = new Response();
                        $response->insertUser();

                } else {
                        $error = new Error();
                        $error->insertUserFail();

                }
        }

}