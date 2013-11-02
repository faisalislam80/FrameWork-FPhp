<?php

/**
 * @author  Md Faisal Islam <faisal@nascenia.com>
 * @since   Nov 2, 2013
 * @version 1.0
 */

/**
 * Autoload Files
 */
include_once "autoload.php";

/**
 * Load Common Functions
 */
include_once "functions.php";

/**
 * Include Configurations
 */
include_once APP_PATH . "config.php";

/**
 * Routing
 */
include_once APP_PATH  . "route.php";
try{
    $FRoute = new FRoute($route);
    $FRoute->execute();
}
catch (Exception $e){
    echo $e->getMessage();
}
