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
    private $_data;
    private $_sessionName;
    private $_isLoggedIn;
    
    public function __construct($user = null){
        $this->_db = new DbConnect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        
        $this->_sessionName = Config::get('session/session_name');
        
        if(!$user){
         
            if(Session::exists($this->_sessionName)){
                $user = Session::get($this->_sessionName);
                
                if($this->find($user)){
                    $this->_isLoggedIn = true;
                } else {
                    // process Logout
                }
            }
        } else {
            $this->find($user);
        }
        
    }
    
    public function create($fields = array()) {
        if(!$this->_db->insert('users', $fields)){
            return false;
        }
        return true;
    }
    
    public function find($user = null) {
        if($user){
            // depending on whether $user is numeric or not, inserting id or Username in $field
            // so we can search users by id or username
            $field = (is_numeric($user)) ? 'user_id' : 'username';
            $this->_db->where($field, $user);
            $data = $this->_db->get('users');
            if($data){
                $this->_data = $data;
                return true;
            }
        }
        return false;
    }
    
    public function login($username = null, $password = null) {
        // calling method find() that gets data from Database and return true or false depends of whether
        // there are data in Database
        $user = $this->find($username);
        
        if($user){
            
            if(password_verify($password, getValue('password_hash', $this->_data))){
                Session::put($this->_sessionName, getValue('user_id', $this->_data));
                return true;
            }
        }
        return false;
    }
    
    public function data() {
        return $this->_data;
    }
    
    public function isLoggedIn() {
        return $this->_isLoggedIn;
    }
}
