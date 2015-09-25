<?php

/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 9/21/2015
 * Time: 12:15 PM
 */


class URL
{
    public $endpoint;
    public $action;
    public $firstParameter;
    public $secondParameter;


   function __construct($input){

        if (isset($input[3])){
            $this->endpoint=$input[3];

        }
        if (isset($input[4])){
            $this->action=$input[4];

        }
        if (isset($input[5])){
            $this->firstParameter=$input[5];
        }

       if (isset($input[6])){
           $this->secondParameter=$input[6];
       }

   }

    function getEndPoint(){

        return $this->endpoint;
    }
    function getAction(){

        return $this->action;
    }
    function getFirstParameter(){

        return $this->firstParameter;
    }

    function getSecondParameter(){

        return $this->secondParameter;
    }

}