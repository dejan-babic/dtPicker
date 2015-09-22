<?php

/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 9/22/2015
 * Time: 10:18 AM
 */
class JobsController
{
    function __construct($action,$arg,$arg1){

        switch($action){

            case 'create':{

                $response=new Jobs($action,$arg,$arg1);
                $response->create();
                break;
            }
            case 'read':{

                $response=new Jobs($action,$arg,$arg1);
                $response->read();
                break;
            }
            case 'update':{

                $response=new Jobs($action,$arg,$arg1);
                $response->update();
                break;
            }
            case 'delete':{

                $response=new Jobs($action,$arg,$arg1);
                $response->delete();
                break;
            }
            default: echo 'unknown action !!!!';
                break;
        }

    }
}