<?php
/**
 * Package   request
 * @author   Faisal Islam <faisal@nascenia.com>
 * @create   11/2/13
 * @modified 11/2/13 (5:09 PM)
 */

class FRequest {

    protected static $instance = null;

    protected static $requestType;

    public static function getInstance() {
        if(self::$instance === null){
            self::$instance = new FRequest();
        }
        return self::$instance;
    }

    protected function __construct() {
        self::$requestType = $_SERVER['REQUEST_METHOD'];
    }

    public static function type() {
        return self::$requestType;
    }

    public function isPost() {
        if(strtolower(self::$requestType) == 'post'){
            return true;
        }
        return false;
    }

    public function isGet() {
        if(strtolower(self::$requestType) == 'get'){
            return true;
        }
        return false;
    }

    public function isPut() {
        if(strtolower(self::$requestType) == 'put'){
            return true;
        }
        return false;
    }

    public function isDelete() {
        if(strtolower(self::$requestType) == 'delete'){
            return true;
        }
        return false;
    }

    public function requestPath() {
        return isset($_GET['app']) ? $_GET['app'] : '/' ;
    }

    public function postData() {
        if($this->isPost()){
            return $_POST;
        }
    }
}
