<?php
/**
 * Package   Index
 * @author   Faisal Islam <faisal@nascenia.com>
 * @create   11/2/13
 * @modified 11/2/13 (4:15 PM)
 */

require_once "library/application.php";

$database = SingletonDatabase::getInstance();
$database->save('guest',array('firstname'=>'Faisal','lastname'=>'Islam'));

