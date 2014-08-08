<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('config/init.php');


//$db = new DbConnect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (Session::exists('home')) {
    echo '<p>' . Session::flash('home') . '</p>';
}

$user = new User();
if($user->isLoggedIn()){
?>

<p>Hello <a href="#"><?php echo getValue('username', $user->data()) ?></a>!</p>

<ul>
    <li><a href="logout.php">Log out</a></li>
</ul>

<?php
} else {
    echo '<p>You need to <a href="login.php">Logg In</a> or <a href="register.php">registrer</a></p>';
}