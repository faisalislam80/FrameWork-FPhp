<?php
/**
 * Package   Database
 * @author   Faisal Islam <faisal@nascenia.com>
 * @create   11/2/13
 * @modified 11/2/13 (10:39 PM)
 */

class SingletonDatabase extends FDatabase {

    protected $allProperties;
    protected $where = null ;
    protected $andWhere = null ;
    protected $orWhere = null ;

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
        $strSQL = 'INSERT INTO '. $this->tableName.' SET  ';
        $iniSQL = $strSQL;
        foreach($this->allProperties as $key => $val){
            if($val != ''){
                if($key == 'tableName' || $key == 'database'
                                       || $key == 'where'
                                       || $key == 'andWhere'
                                       || $key == 'orWhere'
                ){
                    continue;
                }
                else{
                    $strSQL .= '`'.$key .'` = \''.$val.'\', ';
                }
            }
        }

        if($iniSQL === $strSQL){
            echo 'No value passed';
            return false;
        }

        $strSQL = substr($strSQL, 0, -2);

        if($this->where != null ){
            $strSQL = str_ireplace('INSERT INTO','UPDATE',$strSQL);
            $strSQL .= $this->where;
        }

        if($this->andWhere != null ){
            $strSQL .= $this->andWhere;
        }

        if($this->orWhere != null ){
            $strSQL .= $this->orWhere;
        }

        echo $strSQL;

        $statement = $this->database->prepare($strSQL);
        return $statement->execute() ? true : false ;
    }

    public function where($field,$value,$operator = '=') {
        $this->where = ' WHERE `' . $field . '` ' .$operator. ' ' . $value ;
    }

    public function andWhere($field,$value,$operator = '=') {
        $this->andWhere = ' AND ' . $field . ' ' .$operator. ' ' . $value ;
    }

    public function orWhere($field,$value,$operator = '=') {
        $this->orWhere = ' OR ' . $field . ' ' .$operator. ' ' . $value ;
    }
}
