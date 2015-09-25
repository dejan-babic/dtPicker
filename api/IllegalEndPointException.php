<?php

/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 9/24/2015
 * Time: 4:12 PM
 */
class IllegalEndPointException extends Exception
{
    public function __construct($message, $code = 0, Exception $previous = null) {

        parent::__construct($message, $code, $previous);
    }


    function error(){

        $error='You have used illegal end point on line ' . $this->getLine() . ' and on file '.$this->getFile();
        return $error;
    }
}