<?php
/**
 * Package   pathVariables
 * @author   Faisal Islam <faisal@nascenia.com>
 * @create   11/2/13
 * @modified 11/2/13 (4:01 PM)
 */

defined('DS')
    ? null
    : define('DS',DIRECTORY_SEPARATOR);

defined('LIB_PATH')
    ? null
    : define('LIB_PATH',$_SERVER['DOCUMENT_ROOT']."/library");

defined('APP_PATH')
    ? null
    : define('APP_PATH',$_SERVER['DOCUMENT_ROOT']."/apps/");
