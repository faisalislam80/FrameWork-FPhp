<?php
/**
 * Package   database
 * @author   Faisal Islam <faisal@nascenia.com>
 * @create   11/2/13
 * @modified 11/2/13 (4:33 PM)
 */

class FDatabase {

    protected $database;

    public function __construct(){
        global $GlobalConfig;
        try{
            $this->database = new PDO('mysql:host='.
                    $GlobalConfig['Database']['dbHost'] .';dbname='.
                    $GlobalConfig['Database']['dbName'] ,
                    $GlobalConfig['Database']['dbUser'] ,
                    $GlobalConfig['Database']['dbPassword']
            );
            $this->database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (Exception $e){
            echo $e->getMessage();
        }
    }

}
