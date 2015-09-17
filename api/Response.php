<?php

/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 9/14/2015
 * Time: 3:39 PM
 */

include 'autoload/boot.php';
class Response{

    function validate(){
        new JsonEncode(true,'user logged in',true);
    }

    function getUsers($users){


        new JsonEncode(true,'list of users OK',$users);

    }
    function insertUser(){

        new JsonEncode(true,'user inserted',true);

    }
}

