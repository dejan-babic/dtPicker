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

        function readUserFail(){
               new JsonEncode(false,'No users FAIL',false);

        }
        function createUserFail(){
               new JsonEncode(false,'Something went wrong , user has not been created',false);

        }

        function deleteUserFail(){

                new JsonEncode(false,'ERROR : No user has been deleted'  ,false);

        }
        function updateUserFail(){

                new JsonEncode(false,'Something went wrong , user has not been updated' ,false);

        }
        function readJobFail(){
                new JsonEncode(false,'No Job Found',false);

        }
        function createJobFail(){
                new JsonEncode(false,'Something went wrong , job  has not been created',false);

        }

        function deleteJobFail(){

                new JsonEncode(false,'ERROR : No job  has been deleted'  ,false);

        }
        function updateJobFail(){

                new JsonEncode(false,'Something went wrong , job  has not been updated' ,false);

        }

        function dbErrorConnection(){

                new JsonEncode(false,'Not connected to base',false);
        }

}




