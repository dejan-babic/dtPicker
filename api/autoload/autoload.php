<?php
class Autoloader {

    public static function loader($class) {

        $directoryArray=array('api/','autoload/');
        $fileFormat=array('%s.php');

        foreach($directoryArray as $currentDir) {

            foreach($fileFormat as $currentFile) {

                $path = $currentDir . sprintf($currentFile , $class);

                if (file_exists($path)) {
                    include $path;
                    return;
                }
            }
        }
    }
}

