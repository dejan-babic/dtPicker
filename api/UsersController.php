<?php

/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 9/21/2015
 * Time: 1:17 PM
 */


class UsersController
{

    public $firstParameter;
    public $secondParameter;
    public $action;
    public $link;

    function __construct($link , $action , $firstParameter , $secondParameter)
    {
        $this->firstParameter = $firstParameter;
        $this->secondParameter = $secondParameter;
        $this->action = $action;
        $this->link = $link;
    }




    function actionSelect(){

        $usersController=new Users($this->link , $this->firstParameter , $this->secondParameter);
        return call_user_func ( array( $usersController, $this->action) );

    }

}