<?php

/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 9/21/2015
 * Time: 1:17 PM
 */

include_once'autoload/boot.php';
class UsersController
{

    function __construct($action,$arg,$arg1){

        $response=new Users($action,$arg,$arg1);

         switch($action){

              case 'create':{

                    $response->create();
                    break;
              }
              case 'read':{

                    $response->read();
                    break;
              }
              case 'update':{

                    $response->update();
                    break;
              }
              case 'delete':{

                    $response->delete();
                    break;
              }
              default: echo 'unknown action !!!!';
                    break;
         }

    }
}