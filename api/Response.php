<?php

/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 9/14/2015
 * Time: 3:39 PM
 */

include 'autoload/boot.php';
class Response
{


    function __construct($firstPar, $secondPar, $thirdPar)
    {

        new JsonEncode($firstPar, $secondPar, $thirdPar);
    }

}

