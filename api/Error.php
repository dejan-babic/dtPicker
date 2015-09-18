<?php

/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 9/14/2015
 * Time: 2:07 PM
 */

include 'autoload/boot.php';
class Error
{


        function validateFail(){
              new JsonEncode(false,'Validate failed',false);
        }

        function getUsersFail(){
               new JsonEncode(false,'No users retrived',false);

        }
        function insertUserFail(){
               new JsonEncode(false,'Something went wrong , user has not been inserted',false);

        }
        function serverMethodNotExists(){

                new JsonEncode(false,'Method does not exist',false);
        }

        function dbErrorConnection(){

                new JsonEncode(false,'Not connected to base',false);
        }
        function deleteUserError($userId){

                new JsonEncode(false,'No user with id = '.$userId.' exists'  ,false);

        }
        function updateUserError(){

                new JsonEncode(false,'Something went wrong , user has not been updated' ,false);

        }

}




