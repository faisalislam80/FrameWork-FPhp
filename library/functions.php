<?php
/**
 * Package   functions.php
 * @author   Faisal Islam <faisal@nascenia.com>
 * @create   11/2/13
 * @modified 11/2/13 (10:30 PM)
 */


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

function loadModel($com,$modelClass) {
    require_once APP_PATH . "models/". strtolower($com) . "/" . strtolower($modelClass) .".class.php";
}
