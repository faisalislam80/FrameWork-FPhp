<?php
/**
 * Package   Database
 * @author   Faisal Islam <faisal@nascenia.com>
 * @create   11/2/13
 * @modified 11/2/13 (10:39 PM)
 */

class SingletonDatabase extends FDatabase {

    protected static $instance = null ;

    public static function getInstance() {
        if( self::$instance === null ) {
            self::$instance = new SingletonDatabase();
        }
        return self::$instance;
    }

    public function __construct(){
        parent::__construct();
    }

    public function save($tableName,$arrParams) {

        $n = count($arrParams);
        $i=1;
        $strSQL = "INSERT INTO ". $tableName . " SET ";

        foreach($arrParams as $key=>$value){
            if($i>=$n)
                $strSQL .= $key." => :".$key;
            else
                $strSQL .= $key." => :".$key.", ";
            $i++;
        }

        $objPDOStatement = $this->database->prepare($strSQL);

        foreach($arrParams as $key => $value){
            if(FValidation::type($value) == 'integer'){
                $objPDOStatement->bindParam(':'.$key,$value,PDO::PARAM_INT);
            }
            else{
                $objPDOStatement->bindParam(':'.$key,$value,PDO::PARAM_STR);
            }
        }

        return $objPDOStatement->execute() ? true : false ;
    }

}
