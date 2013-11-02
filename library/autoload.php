<?php
/**
 * Automatically Loaded all @name.class.php files of the selected Packages|Controllers|Models
 * Package   autoload
 * @author   Faisal Islam <faisal@nascenia.com>
 * @create   11/2/13
 * @modified 11/2/13 (4:12 PM)
 */

/**
 * Required path variables
 */
require_once "pathVariables.php";

/**
 * Autoload Packages
 */

$autoLoads = array(
    'Packages'      => array(
        'database','request','route'
    ),
    'Controller'    => array(
        'user'
    ),
    'Models'        => array(

    )
);

foreach($autoLoads as $k => $v){
    if($k == 'Packages'){
        foreach($v as $package){
            $files = scandir(LIB_PATH."/Packages/".strtolower($package));
            foreach($files as $file){
                if(strlen($file) > 10){
                    if ('class.php' === substr($file,-9,10)){
                        require_once LIB_PATH . "/Packages/" . strtolower($package) . "/" . strtolower($file);
                    }
                }
            }
        }
    }
    if($k == 'Controller'){
        foreach($v as $package){
            $files = scandir(APP_PATH."controllers/".strtolower($package));
            foreach($files as $file){
                if(strlen($file) > 10){
                    if ('class.php' === substr($file,-9,10)){
                        require_once APP_PATH . "controllers/" . strtolower($package) . "/" . strtolower($file);
                    }
                }
            }
        }
    }
    if($k == 'Models'){
        foreach($v as $package){
            $files = scandir(APP_PATH."models/".strtolower($package));
            foreach($files as $file){
                if(strlen($file) > 10){
                    if ('class.php' === substr($file,-9,10)){
                        require_once APP_PATH . "models/" . strtolower($package) . "/" . strtolower($file);
                    }
                }
            }
        }
    }
}
