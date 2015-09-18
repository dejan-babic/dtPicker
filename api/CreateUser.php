<?php

/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 9/14/2015
 * Time: 1:54 PM
 */

include 'autoload/boot.php';
class CreateUser
{

    public $userInput;
    public $numOfRows;


    function __construct()
    {

        $this->checkMethod();
        $this->checkNotEmpty();
    }

    function response()
    {

        $response = new Response();
        $response->insertUser();

    }

    function checkMethod()
    {


        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->userInput = $_GET['userInput'];
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->userInput = $_POST['userInput'];
        }
    }

    function checkNotEmpty()
    {

        if (!empty($this->userInput)) {

            $this->insertUser();
        } else {

            $error = new Error();
            $error->insertUserFail();
        }
    }

    function insertUser()
    {
        try {
            $conn = new DbConn();
            $link = $conn->connect();
            $stmt = $link->prepare("INSERT INTO users (name) VALUES (:user)");
            $stmt->execute(array(':user' => $this->userInput));
            $this->response();

        } catch (PDOException $e){

            $error = new Error();
            $error->insertUserFail();
        }
    }




}




