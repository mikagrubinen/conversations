<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Password
 *
 * @author miroslav
 */
class Password {
    
    public static function hash($string) {
        return password_hash($string, PASSWORD_DEFAULT);
    }
    
    public static function unique() {
        return self::hash(uniqid());
    }
}
