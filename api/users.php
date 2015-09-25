<?php

/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 9/21/2015
 * Time: 2:46 PM
 */


class Users
{

    public $firstParameter;
    public $secondParameter;
    public $link;

    function __construct($link, $firstParameter, $secondParameter)
    {

        $this->firstParameter = $firstParameter;
        $this->secondParameter = $secondParameter;
        $this->link = $link;
    }


    function read()
    {

        try {
            if (isset($this->firstParameter)) {

                $stmt = $this->link->prepare("SELECT * FROM users WHERE id= $this->firstParameter");

            } else {

                $stmt = $this->link->prepare("SELECT * FROM users");

            }
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                return array(true, 'OK', $results) ;

        }   catch (PDOException $e) {

                return array(false, 'No users FAIL', $e->getMessage());
        }
    }

    function create()
    {

        try {

            $stmt =$this->link->prepare("INSERT INTO users (name) VALUES (:user)");
            $stmt->execute(array(':user' => rawurldecode($this->firstParameter)));

            $result = $stmt->rowCount();

            if ($result == 1) {

                return array(true, 'User created successfully', true);

            } else {

                return false;
            }

        }   catch(PDOException $e){

                return array(false, 'Something went wrong , user has not been created ', $e->getMessage());

        }
    }

    function delete(){

        try {
            $stmt = $this->link->prepare("DELETE FROM users WHERE id= :userId");
            $stmt->execute(array(':userId' => $this->firstParameter));
            $result = $stmt->rowCount();

            if ($result == 1) {

                return array(true, 'User with id: ' .$this->firstParameter. ' has been deleted', true);

            } else {

                return false;
            }

        }   catch (PDOException $e) {

                return array( false ,'ERROR : No user has been deleted' , $e->getMessage() );
        }
    }

    function update(){

        try {
            $stmt = $this->link->prepare("UPDATE users SET name = :userName WHERE id = :userId");
            $stmt->execute(array(':userName' => rawurldecode($this->secondParameter) , ':userId' => $this->firstParameter));
            $result = $stmt->rowCount();

            if ($result == 1){

                return array( true , 'User with id= ' .$this->firstParameter. ' has been updated, and now his name is '
                            .rawurldecode($this->secondParameter) , true );

            }else{

                return array( false , 'User with id= ' .$this->firstParameter. ' does not exists or name : '
                            .rawurldecode($this->secondParameter) . ' is taken' , false );
            }

        }   catch(PDOException $e) {

                 return array( false , 'Something went wrong , user has not been updated' , $e->getMessage() );
        }
    }
}
