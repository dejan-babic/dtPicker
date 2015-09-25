<?php

/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 9/14/2015
 * Time: 3:39 PM
 */


class Response
{

    public $outputArray;


    function encodeData(){

        header('Content-Type: application/json');
        echo json_encode($this->outputArray);

    }

    function setOutputData($output){

        $this->outputArray = array('success' => $output[0],
                                   'msg' => $output[1],
                                   'data'=> $output[2]);
    }



}

