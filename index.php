<?php

include_once'api/autoload/boot.php';

$request=$_SERVER['REQUEST_URI'];

$uri=explode('/',rtrim($request,'/'));

$request=new URL($uri);

$endPoint=$request->getEndPoint();
$action =$request->getAction();
$arg=$request->getArg();
$arg1=$request->getArg1();


switch ($endPoint){

    case 'users':
        new UsersController($action,$arg,$arg1);
        break;

    case 'jobs':
        new JobsController($action,$arg,$arg1);
        break;

    case 'validate':
        new Validate($action);
        break;

    default : echo 'unknown request!!!';
}



