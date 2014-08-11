<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('config/init.php');

if(!$username = Input::get('user')){
    Redirect::to('index.php');
} else {
    $user = new User($username);
    if(!$user->exists()){
        Redirect::to(404);
    } else {
        $data = $user->data();
    }
    ?>

    <h3><?php echo getValue('username', $data) ?></h3>
    <p><?php echo getValue('registration_date', $data) ?></p>
    
    <?php
}