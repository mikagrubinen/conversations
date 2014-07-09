<?php

/**
 * Configuration for: Database Connection
 */

session_start();

define("DB_HOST", "127.0.0.1");
define("DB_NAME", "razgovori");
define("DB_USER", "root");
define("DB_PASS", "malajela");

spl_autoload_register(function ($class){
    require_once 'classes/' . $class . '.php';
});
