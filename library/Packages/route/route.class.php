<?php
/**
 * Package   route
 * @author   Faisal Islam <faisal@nascenia.com>
 * @create   11/2/13
 * @modified 11/2/13 (5:59 PM)
 */

class FRoute extends FRequest{

    protected $pairOfMVC;

    public $controller;

    public $method;

    public $variables = array();

    public function __construct($route) {
        try{
            $this->makeRoute($route);
            $this->separateMVC();
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    }

    protected function makeRoute($arrRoutes)
    {
        $this->pairOfMVC = isset($arrRoutes[$this->requestPath()])
            ? $arrRoutes[$this->requestPath()]
            : false ;
        if($this->pairOfMVC === false){
            die('Please specify a route.');
        }
    }

    protected function separateMVC() {
        $e = explode('@',$this->pairOfMVC);
        $this->controller = $e[0];
        $this->method     = $e[1];
    }

    public function execute() {

        $this->eventBefore();
        try{
            $app = new $this->controller;
            $app->{$this->method}();
        }catch (Exception $e){
            echo $e->getMessage();
        }
        $this->eventAfter();
    }

    public static function eventBefore($arrMVC = array())
    {

    }

    public static function eventAfter($arrMVC = array())
    {

    }

}
