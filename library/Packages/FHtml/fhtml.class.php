<?php
/**
 * Package   fhtml.class.php
 * @author   Faisal Islam <faisal@nascenia.com>
 * @create   11/3/13
 * @modified 11/3/13 (12:34 AM)
 */

class FHtml {

    protected static $masterLayout = null;

    public function __construct($layoutName) {
            self::extendMaster($layoutName);
    }

    protected static function extendMaster($layoutName) {
        self::$masterLayout = file_get_contents( APP_PATH . '/views/MasterLayout/' . $layoutName . '.fhtml.php' );
    }

    public function loadView($folder,$file,$placeholder = array()) {

        $tempContent = file_get_contents(APP_PATH . '/views/' . $folder . '/' . $file . '.fhtml.php');
        foreach($placeholder as $k => $v){
            $tempContent = str_ireplace('[[+'.$k.']]',$v,$tempContent);
        }
        return $tempContent;
    }

    public static function showView($content,$other = array()) {

        if(self::$masterLayout === null){
            global $GlobalConfig;
            self::$masterLayout = $GlobalConfig['Layout']['masterLayout'];
        }

        $tmpContent = self::$masterLayout;

        $tmpContent = str_ireplace('{{% CONTENT %}}',$content,$tmpContent);

        foreach($other as $k => $v){
            $tmpContent = str_ireplace($k,$v,$tmpContent);
        }

        echo $tmpContent;
    }
}
