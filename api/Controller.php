<?php
/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 9/14/2015
 * Time: 10:40 AM
 */

include 'autoload/boot.php';
class Controller{

    function validate()
    {

        new Validate();

    }
    function getUsers()
    {

        new GetUsers();

    }

    function insertUser()
    {

        new InsertUser();

    }

}


$ApiCheck = new Controller();
$serverMethod = SERVER['REQUEST_METHOD'];


switch ($serverMethod){

    case "GET":
               if (method_exists($ApiCheck, $_GET['method'])) {
                   $ApiCheck->$_GET['method']();

               }else{

                   $error= new Error();
                   $error->serverMethodNotExists();
               }
                break;

    case "POST":  if (method_exists($ApiCheck, $_POST['method'])) {
                        $ApiCheck->$_POST['method']();

                    }else{

                       echo 'nije reseno za POST';
                    }
                        break;

    default: $error= new Error();
             $error->serverMethodNotExists();
                 break;
}
?>

