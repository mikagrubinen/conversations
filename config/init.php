<?php

/**
 * Configuration for: Database Connection
 */

session_start();


define("DB_HOST", "127.0.0.1");
define("DB_NAME", "razgovori");
define("DB_USER", "root");
define("DB_PASS", "malajela");


$GLOBALS['config'] = array(
    'mysql' => array(
        'host' => DB_HOST,
        'username' => DB_USER,
        'password' => DB_PASS,
        'db' => DB_NAME
    ),
    'session' => array(
        'session_name' => 'user'
    )
);

spl_autoload_register(function ($class){
    require_once 'classes/' . $class . '.php';
});

require_once 'functions/getValue.php';