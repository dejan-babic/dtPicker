<?php

/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 9/21/2015
 * Time: 2:46 PM
 */

include_once'autoload/boot.php';
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
            $link=$conn->connect();

            if (isset($this->arg)) {

                $stmt = $link->prepare("SELECT * FROM users WHERE id=$this->arg");

            } else {

                $stmt = $link->prepare("SELECT * FROM users");

            }
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->response(true, 'OK', $results);

        }   catch (PDOException $e) {

            $this->response(false,'No users FAIL',false);


        }
    }

    function create()
    {

        try {

            $conn = new DbConn();
            $link = $conn->connect();
            $stmt = $link->prepare("INSERT INTO users (name) VALUES (:user)");
            $stmt->execute(array(':user' => rawurldecode($this->arg)));

            $result = $stmt->rowCount();

            if ($result == 1) {
                $this->response(true, 'User created successfully', true);
            } else {

                return false;
            }

        }   catch(PDOException $e){

            $this->response(false,'Something went wrong , user has not been created',false);

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

                $this->response(true,'User with id: ' .$this->arg. ' has been deleted',true );

            } else {

                return false;
            }

        }   catch (PDOException $e) {

            $this->response(false,'ERROR : No user has been deleted'  ,false);
        }
    }

    function update(){

        try {
            $conn = new DbConn();
            $link = $conn->connect();
            $stmt = $link->prepare("UPDATE users SET name = :userName WHERE id = :userId");
            $stmt->execute(array(':userName' => rawurldecode($this->arg1) , ':userId' => $this->arg));
            $result=  $stmt->rowCount();

            if ($result == 1){
                $this->response(true,'User with id= ' .$this->arg. ' has been updated, and now his name is '.rawurldecode($this->arg1),true);
            }else{

                return false;
            }

        }   catch(PDOException $e) {

            $this->response(false,'Something went wrong , user has not been updated' ,false);
        }

    }

    function response($firstPar, $secPar, $thirdPar){

            $response=new Response($firstPar, $secPar, $thirdPar);
            $response->encodeData();
    }



}
