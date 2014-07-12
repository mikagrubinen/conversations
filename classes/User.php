<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author miroslav
 */
class User {
    private $_db;
    
    public function __construct($user = null){
        $this->_db = new DbConnect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }
    
    public function create($fields = array()) {
        if(!$this->_db->insert('users', $fields)){
            return false;
        }
        return true;
    }
}
