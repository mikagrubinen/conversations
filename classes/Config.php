<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Config
 *
 * @author miroslav
 */
class Config {
    public static function get($path = null) {
        if($path){
            $config = GLOBALS['config'];
        }
    }
}
