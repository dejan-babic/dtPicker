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
class Response{

    function validate(){
        $response=new JsonEncode(true,'user logged in','home.html');
    }

    function getUsers(){

        $users=new GetUsers();
        $response=new JsonEncode(true,'list of users OK',$users->usersResolt);

    }
    function insertUser(){
        $response=new JsonEncode(true,'user inserted','name of user ');

    }
}

