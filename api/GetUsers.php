<?php

/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 9/14/2015
 * Time: 12:57 PM
 */

include 'autoload/boot.php';
class GetUsers
{

    public $usersResults;

    public $numOfRows;

    function __construct()
    {
        try {
            $conn = new DbConn();
            $link = $conn->connect();
            $stmt = $link->prepare("SELECT * FROM users");
            $stmt->execute();
            $this->userResolts = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->response($this->userResolts);

        } catch (PDOException $e) {
            $error = new Error();
            $error->insertUserFail();
        }

    }
        function response($users){

            $response=new Response();
            $response->getUsers($users);
        }



}






