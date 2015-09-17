<?php

/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 9/14/2015
 * Time: 12:41 PM
 */


include 'autoload/boot.php';
class Validate{

        function __construct()
        {

            $userInput = $_GET['userInput'];

            if ($userInput == 'devtech') {

                $response= new Response();
                $response->validate();


            } else {

               $error= new Error();
               $error->validateFail();

            }

        }
}


