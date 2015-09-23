<?php

/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 9/22/2015
 * Time: 10:18 AM
 */
include_once'autoload/boot.php';
class JobsController
{
    function __construct($action,$arg,$arg1){

        $response=new Jobs($action,$arg,$arg1);

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