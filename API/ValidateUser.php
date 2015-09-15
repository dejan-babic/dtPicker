<?php

/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 9/14/2015
 * Time: 12:41 PM
 */

include_once 'Response.php';
include_once'ErrorClass.php';
class Validate{

        function __construct()
        {
            $userInput = $_GET['userInput'];
            if ($userInput == 'devtech') {

                $response= new Response();
                return $response->validate();


            } else {

               $error= new Error();
               return $error->validateFail();

            }

        }
}


