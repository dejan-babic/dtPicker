<?php

/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 9/14/2015
 * Time: 3:39 PM
 */
include_once 'JsonEncode.php';
include_once 'GetUsers.php';
include_once 'DbConn.php';
include_once 'InsertUser.php';
class Response{

    function validate(){
        $response=new JsonEncode(true,'user logged in',true);
    }

    function getUsers($users){


        $response=new JsonEncode(true,'list of users OK',$users);

    }
    function insertUser(){

        $response=new JsonEncode(true,'user inserted',true);

    }
}

