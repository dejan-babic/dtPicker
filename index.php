<?php

include_once 'api/autoload/Autoload.php';

spl_autoload_register('Autoloader::loader');

$request=$_SERVER['REQUEST_URI'];

$uri=explode('/',rtrim($request,'/'));

$request=new URL($uri);

$bdConn=new dbConn();
$link=$bdConn->connect();

$endPoint=$request->getEndPoint();
$action =$request->getAction();
$firstParameter=$request->getFirstParameter();
$secondParameter=$request->getSecondParameter();

$response=new Response;

try {$Controller = EndPointFactory::getInstance($link, $endPoint, $action, $firstParameter, $secondParameter);
     $response->setOutputData($Controller->actionSelect());
     $response->encodeData();

}catch(IllegalEndPointException $e){

    echo $e->error();
}

