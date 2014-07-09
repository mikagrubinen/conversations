<?php

require_once('config/init.php');

if(Input::exists()){
    $validate = new Validate();
    
    $validation = $validate->check($_POST, array(
        'username' => array(
            'required' => true,
            'min' => 2,
            'max' => 20,
            'unique' => 'users'
        ),
        'email' => array(
            'required' => true,
            'max' => 64,
            'unique' => 'users'
        ),
        'password' => array(
            'required' => true,
            'min' => 6
        ),
        'password_repeat' => array(
            'required' => true,
            'matches' => 'password'
        ),
    ));
    
    if ($validation->passed()) {
        echo "Passed";
    } else {
        print_r($validation->errors());
    }
}

?>


<form method="post" action="" name="registerform">
    
    <!-- the user name input field uses a HTML5 pattern check -->
    <div class="field">
    <label for="username">Username (only letters and numbers, 2 to 20 characters)</label>
    <input id="username" type="text" pattern="[a-zA-Z0-9]{2,64}" name="username" value="<?php echo Input::get('username'); ?>" >
    </div>
    
    <!-- the email input field uses a HTML5 email type check -->
    <div class="field">
    <label for="email">User's email</label>
    <input id="email" type="email" name="email" value="<?php echo Input::get('email'); ?>"/>
    </div>
    
    <div class="field">
    <label for="password">Password (min. 6 characters)</label>
    <input id="password" type="password" name="password" pattern=".{6,}"  autocomplete="off" />
    </div>
    
    <div class="field">
    <label for="password_repeat">Repeat password</label>
    <input id="password_repeat" type="password" name="password_repeat" pattern=".{6,}"  autocomplete="off" />
    </div>
    
    <input type="submit"  name="register" value="Register" />

</form>
