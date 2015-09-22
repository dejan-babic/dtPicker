<?php
class Autoloader
{
    public static function loader($class)
    {
        $filename ='api/'. $class . '.php';
        $file =$filename;
        if (!file_exists($file))
        {
            return false;
        }else{
        include $file;
         }
    }
}