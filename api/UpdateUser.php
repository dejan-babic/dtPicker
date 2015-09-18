<?php

/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 9/18/2015
 * Time: 1:07 PM
 */
class UpdateUser
{
    public $userName;
    public $userId;



        function __construct(){

                $this->setUserInput();
                $this->updateUserQuery();
        }

        function setUserInput(){

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $this->userId = $_GET['userId'];
                $this->userName = $_GET['userName'];
            }elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $this->userId = $_POST['userId'];
                $this->userName = $_POST['userName'];
                }
        }

        function updateUserQuery (){
            try {
                $conn = new DbConn();
                $link = $conn->connect();
                $sql = "UPDATE users SET name = :userName WHERE id = :userId";
                $stmt = $link->prepare($sql);
                $stmt->execute(array(':userName' => $this->userName, ':userId' => $this->userId));
                $result=  $stmt->rowCount();
                if ($result == 1){
                    $this->response();
                }else{
                    $error = new Error();
                    $error->updateUserError();
                }


            }   catch(PDOException $e) {

                $error = new Error();
                $error->updateUserError();
            }

        }
        function response(){

            $response = new Response();
            $response->updateUser();

        }

}