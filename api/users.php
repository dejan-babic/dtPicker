<?php

/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 9/21/2015
 * Time: 2:46 PM
 */

include 'autoload/boot.php';
class Users
{

    public $arg;
    public $arg1;
    public $action;

    function __construct($action , $arg ,$arg1 )
    {

        $this->arg = $arg;
        $this->arg1 = $arg1;
        $this->action = $action;
    }


    function read()
    {

        try {
            $conn = new DbConn();
            $link = $conn->connect();

            if (isset($this->arg)) {

                $stmt = $link->prepare("SELECT * FROM users WHERE id=$this->arg");

            } else {

                $stmt = $link->prepare("SELECT * FROM users");

            }
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->response(true, 'OK', $results);

        }   catch (PDOException $e) {

            $error = new Error();
            $error->readUserFail();


        }
    }

    function create()
    {

        try {

            $conn = new DbConn();
            $link = $conn->connect();
            $stmt = $link->prepare("INSERT INTO users (name) VALUES (:user)");
            $stmt->execute(array(':user' => $this->arg));

            $result = $stmt->rowCount();

            if ($result == 1) {
                $this->response(true, 'User created successfully', true);
            } else {

                return false;
            }

        }   catch(PDOException $e){

            $error = new Error();
            $error->createUserFail();

        }



    }


    function delete(){
        try {
            $conn = new DbConn();
            $link = $conn->connect();
            $stmt = $link->prepare("DELETE FROM users WHERE id= :userId");
            $stmt->execute(array(':userId' => $this->arg));
            $result = $stmt->rowCount();

            if ($result == 1) {

                $this->response(true,'User with id= ' .$this->arg. ' has been deleted',true );

            } else {

                return false;
            }

        }   catch (PDOException $e) {

            $error = new Error();
            $error->deleteUserFail();
        }
    }

    function update(){



        try {
            $conn = new DbConn();
            $link = $conn->connect();
            $stmt = $link->prepare("UPDATE users SET name = :userName WHERE id = :userId");
            $stmt->execute(array(':userName' => $this->arg1 , ':userId' => $this->arg));
            $result=  $stmt->rowCount();

            if ($result == 1){
                $this->response(true,'User with id= ' .$this->arg. ' has been updated, and now his name is '.$this->arg1,true);
            }else{

                return false;
            }

        }   catch(PDOException $e) {
            $error = new Error();
            $error->updateUserFail();
        }

    }


        function response($firstPar, $secPar, $thirdPar){

            new Response($firstPar, $secPar, $thirdPar);

    }



}
