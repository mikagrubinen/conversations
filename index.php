<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('config/init.php');


//$db = new DbConnect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (Session::exists('home')) {
    echo Session::flash('home');
}

echo Session::get(Config::get('session/session_name'));