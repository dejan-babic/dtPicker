<?php

/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 9/24/2015
 * Time: 3:10 PM
 */
class EndPointFactory
{

    public static function getInstance($link,$endpoint, $action, $firstParameter, $secondParameter){

       if ($endpoint == 'users') {

           return new UsersController($link, $action, $firstParameter, $secondParameter);

       }
       elseif ($endpoint == 'jobs'){

            return new JobsController($link, $action, $firstParameter, $secondParameter);
       } else{

           throw new IllegalEndPointException('Endpoint does not exists!!') ;
       }

    }
}