<?php
/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 9/14/2015
 * Time: 10:40 AM
 */
include_once 'ValidateUser.php';
include_once 'GetUsers.php';
include_once 'InsertUser.php';

class Controler{

    function validate()
    {

        $validation = new Validate();

    }
    function getUsers()
    {

        $users = new Response();


    }

    function insertUser()
    {

        $insertNewUser = new insertUser();
    }

}


$ApiCheck = new Controler();
if (method_exists($ApiCheck,$_GET['method'])) {

    $ApiCheck->$_GET['method']();
} else {

    header('Content-Type:application/json');
    echo json_encode(
        array('response' => false,
            'msg' => 'Method does not exists!!!',
            'data' => false));


}