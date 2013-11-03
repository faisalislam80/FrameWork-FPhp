<?php
/**
 * Package   Validation
 * @author   Faisal Islam <faisal@nascenia.com>
 * @create   11/2/13
 * @modified 11/2/13 (11:06 PM)
 */

class FValidation {

    public static function type($param) {
        return gettype($param);
    }

    /**
     * @param $email
     * @return mixed
     */
    public static function isEmail($email) {
        return filter_var($email,FILTER_VALIDATE_EMAIL);
    }

    public static function isInteger($int) {
        return filter_var($int,FILTER_VALIDATE_INT);
    }

    public static function isLength($string,$length,$operator = '==') {
        if($operator == '=='){
            return (strlen($string) == $length) ? true : false ;
        }
        elseif($operator == '>='){
            return (strlen($string) >= $length) ? true : false ;
        }
        elseif($operator == '<='){
            return (strlen($string) <= $length) ? true : false ;
        }
        elseif($operator == '<'){
            return (strlen($string) < $length) ? true : false ;
        }
        elseif($operator == '>'){
            return (strlen($string) > $length) ? true : false ;
        }
        elseif($operator == '!=' || $operator == '<>'){
            return (strlen($string) != $length) ? true : false ;
        }
        return false;
    }
}