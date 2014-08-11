<?php

/* 
 * Allowing user to log out
 */

require_once 'config/init.php';

$user = new User();
$user->logout();

Redirect::to('index.php');