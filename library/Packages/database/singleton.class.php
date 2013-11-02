<?php
/**
 * Package   Database
 * @author   Faisal Islam <faisal@nascenia.com>
 * @create   11/2/13
 * @modified 11/2/13 (10:39 PM)
 */

class SingletonDatabase extends FDatabase {

    protected $tableName;

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

    public function save() {}

}
