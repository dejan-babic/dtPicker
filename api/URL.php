<?php

/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 9/21/2015
 * Time: 12:15 PM
 */
include_once'autoload/boot.php';

class URL
{
    public $endpoint;
    public $action;
    public $arg;
    public $arg1;


   function __construct($input){

        if (isset($input[3])){
            $this->endpoint=$input[3];

        }
        if (isset($input[4])){
            $this->action=$input[4];

        }
        if (isset($input[5])){
            $this->arg=$input[5];
        }

       if (isset($input[6])){
           $this->arg1=$input[6];
       }

   }

    function getEndPoint(){

        return $this->endpoint;
    }
    function getAction(){

        return $this->action;
    }
    function getArg(){

        return $this->arg;
    }

    function getArg1(){

        return $this->arg1;
    }

}