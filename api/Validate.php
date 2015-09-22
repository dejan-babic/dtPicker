<?php

/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 9/14/2015
 * Time: 12:41 PM
 */


include 'autoload/boot.php';
class Validate
{


    function __construct($action)
    {


        if ($action == 'devtech') {

           new Response(true, 'User logged in', true);


        } else {

            $error = new Error();
            $error->validateFail();

        }

    }
}


