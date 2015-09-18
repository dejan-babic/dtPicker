<?php
class Autoloader
{
    public static function loader($class)
    {
        $filename = $class . '.php';
        $file =$filename;
        if (!file_exists($file))
        {
            return false;
        }else{
        include $file;
         }
    }
}