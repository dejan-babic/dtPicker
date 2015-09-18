<?php

/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 9/14/2015
 * Time: 12:41 PM
 */


include 'autoload/boot.php';
class Validate{

    public $userInput;
        function __construct()
        {
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $this->userInput = $_GET['userInput'];
            } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $this->userInput = $_POST['userInput'];
            }



            if ($this->userInput == 'devtech') {

                $response= new Response();
                $response->validate();


            } else {

               $error= new Error();
               $error->validateFail();

            }

        }

    function serverMethodCheck(){

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->userInput = $_GET['userInput'];
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->userInput = $_POST['userInput'];
        }
    }
}


