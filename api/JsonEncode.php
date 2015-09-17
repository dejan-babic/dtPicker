<?php

/**
 * Created by PhpStorm.
 * User: drazen.popov
 * Date: 9/15/2015
 * Time: 9:17 AM
 */
class JsonEncode
{
        public $success;
        public $msg;
        public $data;



        function __construct($successData,$messageData,$data){

                $this->success=$successData;
                $this->msg=$messageData;
                $this->data=$data;


                header('Content-Type: Application/json');
                echo json_encode(
                    array("success" => $this->success,
                        "msg" => $this->msg,
                        "data" => $this->data));

        }
}




