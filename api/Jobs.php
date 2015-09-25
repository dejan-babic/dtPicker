<?php

/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 9/22/2015
 * Time: 10:28 AM
 */

class Jobs {

    public $firstParameter;
    public $secondParameter;
    public $link;

    function __construct ($link, $firstParameter, $secondParameter)
    {

        $this->firstParameter = $firstParameter;
        $this->secondParameter = $secondParameter;
        $this->link = $link;
    }

    function read() {

        try {

            if (isset($this->firstParameter)) {
                $stmt = $this->link->prepare("SELECT * FROM jobs WHERE id=$this->firstParameter");
            } else {
                $stmt = $this->link->prepare("SELECT * FROM jobs");
            }
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return array(true, 'OK', $results) ;

        } catch (PDOException $e) {

            return array(false, 'No users FAIL', $e->getMessage());

        }
    }

    function create(){

        try {

            $stmt = $this->link->prepare("INSERT INTO jobs (name) VALUES (:user)");
            $stmt->execute(array(':user' => rawurldecode($this->firstParameter)));

            $result = $stmt->rowCount();

            if ($result == 1) {

                return array(true, 'Job created successfully with the id: '.$this->link->lastInsertId(), true);

            } else {

                return false;
            }

        } catch(PDOException $e){

                return array(false, 'Error job has not been created', false);

        }
    }

    function delete(){

        try {

            $stmt = $this->link->prepare("DELETE FROM jobs WHERE id= :userId");
            $stmt->execute(array(':userId' => $this->firstParameter));
            $result = $stmt->rowCount();

            if ($result == 1) {

                return array(true, 'Job with id: ' .$this->link->lastInsertId(). ' has been deleted', true);

            } else {

                return array(false, 'ERROR : Job with id: ' .$this->firstParameter. ' has not been deleted', false);
            }

        }   catch (PDOException $e) {

                return array(false, 'Something went wrong , job  has not been deleted', $e->getMessage());

        }
    }

    function update(){

        try {

            $stmt = $this->link->prepare("UPDATE jobs SET name = :userName WHERE id = :userId");
            $stmt->execute(array(':userName' =>rawurldecode($this->secondParameter) , ':userId' => $this->firstParameter));
            $result=  $stmt->rowCount();

            if ($result == 1){
                return array(true, 'Job with id= ' . $this->firstParameter . ' has been updated, and now his name is '
                              .rawurldecode($this->secondParameter), true);
            }else{

                return array(false, 'ERROR : Job with id= ' . $this->firstParameter . ' has NOT been updated ', false);
            }

        }   catch(PDOException $e) {

                return array(false, 'Something went wrong , job  has not been updated', false);
        }

    }


}