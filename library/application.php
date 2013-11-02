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


/**
 * Dump and die
 * @param $data
 * @since   Nov 2, 2013
 * @version 1.0
 */
function dd($data ){
    echo '<pre>';
        var_dump($data);
    echo '</pre>';
    die ;
}
