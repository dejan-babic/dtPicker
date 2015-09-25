<?php

/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 9/22/2015
 * Time: 10:18 AM
 */

class JobsController
{
    public $firstParameter;
    public $secondParameter;
    public $action;
    public $link;

    function __construct($link, $action, $firstParameter, $secondParameter)
    {
        $this->firstParameter = $firstParameter;
        $this->secondParameter = $secondParameter;
        $this->action = $action;
        $this->link = $link;
    }


    function actionSelect(){

        $jobsController=new Jobs($this->link, $this->firstParameter, $this->secondParameter);
        return call_user_func ( array( $jobsController, $this->action) );
    }
}