<?php

/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 9/14/2015
 * Time: 3:39 PM
 */

include 'autoload/boot.php';
class Response
{

    public $responseArray;

    function __construct($firstPar, $secondPar, $thirdPar){

        $this->responseArray=array('success'=>$firstPar,
                                   'msg' => $secondPar,
                                   'data'=> $thirdPar);


    }

    function encodeData(){

        header('Content-Type: application/json');
        echo json_encode($this->responseArray);

    }

}

