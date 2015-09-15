<?php

/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 9/14/2015
 * Time: 2:07 PM
 */
include_once 'JsonEncode.php';
class Error
{


        function validateFail(){
               $error=new JsonEncode(false,'Validate failed',false);
        }

        function getUsersFail(){
                $error=new JsonEncode(false,'No users retrived',false);

        }
        function insertUserFail(){
                $error=new JsonEncode(false,'Something went wrong , user has not been inserted',false);

        }
}




