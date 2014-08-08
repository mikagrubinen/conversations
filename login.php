<?php

/* 
 * Allows user to log in
 */

require_once('config/init.php');

//check if input exists
if(Input::exists()){
    //create instance of Validate class
    $validate = new Validate();
    
    // use check() method of Validate class to validate the input data
    $validation = $validate->check($_POST, array(
        'username' => array(
            'required' => true,
            'min' => 2,
            'max' => 20
        ),
        'password' => array(
            'required' => true,
            'min' => 6
        )
    ));
    
    // check if input data validation passed
    if($validation->passed()){
        // log user in, instaciate new User object and pass 'username' and 'password' to login() method of User class
        $user = new User();
        $login = $user->login(Input::get('username'), Input::get('password'));
        
        if($login){
            Redirect::to('index.php');
        } else {
            echo "Log in did not sucsess";
        }
    } else {
        foreach($validation->errors() as $error){
            echo $error, '<br>';
        }
    }
}

?>

<form action ="" method = "post">
    <div class ="field">
        <label for ="username">Username</label>
        <input type="text" name="username" id="username" value="<?php echo Input::get('username'); ?>">
    </div>

    <div class ="field">
        <label for ="password">Password</label>
        <input type="password" name="password" id="password" value="">
    </div>
    
    <input type="submit" value="log in">
</form>