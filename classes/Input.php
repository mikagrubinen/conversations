<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of input
 *
 * @author miroslav
 */
class Input {
    public static function exists() {
        return (!empty($_POST)) ? true : false;
    }
    
    public static function get($item) {
        if(isset($_POST[$item])){
            return $_POST[$item];
        }
        return '';
    }
}
 

