<?php
/**
 * Package   Database
 * @author   Faisal Islam <faisal@nascenia.com>
 * @create   11/2/13
 * @modified 11/2/13 (10:39 PM)
 */

class SingletonDatabase extends FDatabase {

    protected $allProperties;
    public function __construct($tableName,$id = null){
        parent::__construct();
        $this->tableName = $tableName;
        $this->setDynamicProperty();
        if($id !== null){
            $this->id = $id;
            $this->setDynamicValue();
        }
    }

    protected function setDynamicProperty() {
        $strSQL = 'SHOW COLUMNS FROM '.$this->tableName;
        $objStatement = $this->database->prepare($strSQL);
        $objStatement->execute();
        while($objColumn = $objStatement->fetch(PDO::FETCH_OBJ)){
            $this->{$objColumn->Field} = '';
        }
    }

    protected function setDynamicValue() {
        $strSQL = "SELECT * FROM ".$this->tableName ." WHERE id = ". $this->id ;
        $objStatement = $this->database->prepare($strSQL);
        $objStatement->execute();
        $objColumn = $objStatement->fetch(PDO::FETCH_OBJ);
        foreach($objColumn as $key => $val){
            $this->{$key} = $val;
        }
    }

    protected function getAllProperty() {
        $this->allProperties = get_object_vars($this);
    }

    public function save() {
        $this->getAllProperty();
        $strSQL = 'INSERT INTO '. $this->tableName.' SET ';
        foreach($this->allProperties as $key => $val){
            if($val != ''){
                if($key == 'tableName' || $key == 'database'){
                    continue;
                }
                else{
                    $strSQL .= '`'.$key .'` = \''.$val.'\', ';
                }
            }
        }
        $strSQL = substr($strSQL, 0, -2);
        $statement = $this->database->prepare($strSQL);
        return $statement->execute() ? true : false ;
    }

}
