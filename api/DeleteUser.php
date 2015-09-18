<?php

/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 9/17/2015
 * Time: 12:50 PM
 */

include 'autoload/boot.php';

class DeleteUser
{
    public $link;
    public $userId;
    public $deletedUsersIds=[];


    function __construct()
    {

        $this->checkMethod();
        try {

            $conn = new DbConn();
            $this->link = $conn->connect();
            $this->setUserDeleted();
            $this->deleteUser();
            if(!empty($this->deletedUsersIds)) {
                $this->response($this->deletedUsersIds[0][0], $this->deletedUsersIds[0][1]);
            }else{

                $error = new Error();
                $error->deleteUserError($this->userId);
            }

        } catch (PDOException $e) {
            $error = new Error();
            $error->deleteUserError($this->userId);

        }
    }

    function response($name, $id)
    {

        $response = new Response();
        $response->deleteUser($name, $id);

    }

    function deleteUser()
    {
        $stmt = $this->link->prepare("DELETE FROM users WHERE id= :userId ");
        $stmt->execute(array(':userId' => $this->userId));

    }

    function setUserDeleted()
    {
        try {
            $query = "SELECT * FROM users WHERE id=:userId";
            $stmt = $this->link->prepare($query);
            $stmt->execute(array(':userId' => $this->userId));
            $this->deletedUsersIds = $stmt->fetchAll();
        } catch (PDOException $e) {
            $error = new Error();
            $error->deleteUserError($this->userId);
        }
    }

    function checkMethod(){
                if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                $this->userId = $_GET['userId'];
                } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $this->userId = $_POST['userId'];
                }

}
}