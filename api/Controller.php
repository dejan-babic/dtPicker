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
include_once 'ErrorClass.php';

class Controller{

    function validate()
    {

        $validation = new Validate();

    }
    function getUsers()
    {

        $users = new GetUsers();

    }

    function insertUser()
    {

        $insertNewUser = new InsertUser();

    }

}


$serverMethod=$_SERVER['REQUEST_METHOD'];

switch ($serverMethod){

    case 'GET':$ApiCheck = new Controller();
               if (method_exists($ApiCheck, $_GET['method'])) {
                   $ApiCheck->$_GET['method']();

               }else{

                   $error= new Error();
                   $error->serverMethodNotExists();
               }
                break;

    case 'POST':$ApiCheck = new Controller();
                if(method_exists($ApiCheck, $_POST['method'])) {
                    $ApiCheck->$_POST['method']();
                }
                    $error= new Error();
                    $error->serverMethodNotExists();
                break;

    default: $error= new Error();
             $error->serverMethodNotExists();
}
?>


