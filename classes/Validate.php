<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Validate
 *
 * @author miroslav
 */
class Validate {
    private $_passed = false,
            $_errors = array(),
            $_db = null;
    
    public function __construct() {
        $this->_db = new DbConnect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }
    
    public function check($source, $items = array()) {
        foreach ($items as $item => $rules) {
            foreach ($rules as $rule => $rule_value) {
                
                $value = trim($source[$item]);

                if($rule === 'required' && empty($value)){
                    $this->addError("{$item} is required");
                } else if (!empty($value)){
                    
                    switch ($rule){
                        case 'min':
                            if(strlen($value) < $rule_value){
                                $this->addError("{$item} must be a minimum of {$rule_value} characters.");
                            }
                        break;
                        case 'max':
                            if(strlen($value) > $rule_value){
                                $this->addError("{$item} must be a maximum of {$rule_value} characters.");
                            }                            
                        break;
                        case 'matches':
                            if($value != $source[$rule_value]){
                                $this->addError("{$rule_value} must match {$item}");
                            }
                        break;
                        case 'unique':
                            $this->_db->where($item, $value);
                            if ($this->_db->get($rule_value)) {
                                $this->addError("{$item} already exists");
                            }
                            $this->_db->emptyWhere();
                        break;
                        case 'validEmail':
                            if(!filter_var($value, FILTER_VALIDATE_EMAIL)){
                                $this->addError("{$value} is not a valid email.");
                            }                            
                        break;    
                    }
                }
            }
        }
        
        if(empty($this->_errors)) {
            $this->_passed = true;
        }
        
        return $this;
    }
    
    private function addError($error) {
        $this->_errors[] = $error;
    }
    
    public function errors() {
        return $this->_errors;
    }
    
    public function passed() {
        return $this->_passed;
    }
}
