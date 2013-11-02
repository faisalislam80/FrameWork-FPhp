<?php
/**
 * Package   user.class.php
 * @author   Faisal Islam <faisal@nascenia.com>
 * @create   11/2/13
 * @modified 11/2/13 (11:41 PM)
 */

class GuestCard extends SingletonDatabase {

    protected $tableName = 'guest_card';

    public function __construct($id = null){
        if($id === null){
            parent::__construct($this->tableName);
        }
        else{
            parent::__construct($this->tableName,$id);
        }
    }

}