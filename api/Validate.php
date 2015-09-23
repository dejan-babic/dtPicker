<?php

/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 9/14/2015
 * Time: 12:41 PM
 */


include_once'autoload/boot.php';
class Validate{

    function __construct($action)
    {


        if ($action == 'devtech') {

            $response = new Response(true, 'User logged in', true);
            $response->encodeData();

        } else {

            $response = new Response(false, 'User NOT logged in', false);
            $response->encodeData();

        }

    }


}

