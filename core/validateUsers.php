<? ob_start(); ?>
<?php
/**
 * Start session and unset session
 */
 session_start();
 session_unset();

/**
 * manual setting date and timezone for application 
 */
 date_default_timezone_set("Jamaica");

/**
 * Link supporting script to give access to all classes and important classes for page use.
 */
 require_once '../lib/ClassAutoLoader.php';
 

/**
 * Get the GET date from the user 
 */
 $request_page=$_GET['page'];

 

/**
 * Base on the request page 
 */
 switch($request_page){
     case 'login':

    /**
    * Iniatilize the login class to validate user. 
    */
     $login = new LoginValidationClass(); 
    /**
      * Set the post data from user that ie.
      * $userName
      * $password
      */
     $userName=$_POST['usrnme'];
     $password=$_POST['pswrd'];

     $login->userName=$userName;
     $login->password=$password;
     //Set the login time of user 
    
     $login_result = $login->loginUser();
     if($login_result['error']){
        print_r($login_result['msg']);
        //set the error session var and redirect to login screen for display
        $_SESSION['errors'] = $login_result['msg'];
        header('Location:../login.php');
     }else{
        //set the session vars for personal info and redirect to index.php
        $_SESSION['firstname'] = $login_result['msg']['firstname'];
        $_SESSION['lastname']  = $login_result['msg']['lastname'];
        $_SESSION['avatar']    = $login_result['msg']['avatar'];
        $_SESSION['personID']  = $login_result['msg']['pindex'];
        header('Location:../index.php');
     }
     
    //echo '<br/>Username: '.$userName.'<br>';
     //echo 'Password: '.$password.'<br>';
     //echo 'Request Page: '.$request_page;   
     
     break;

     case 'signup':

     //initialize sign up class
     $signup = new SignUp();
     //Get Post Data from sign up form

     $fname=(isset($_POST['firstname'])?$_POST['firstname']:"");
     $lname=(isset($_POST['lastname'])?$_POST['lastname']:"");
     $password=(isset($_POST['password'])?$_POST['password']:"");
     $email=(isset($_POST['email-address'])?$_POST['email-address']:"");
     $agreement=(isset($_POST['agreement'])?$_POST['agreement']:"");

     //Display POST DATA 
    //  echo 'Fist Name: '.$fname;
    //  echo '<br>Last Name: '.$lname;
    //  echo '<br>Email: '.$email;
    //  echo '<br>Password: '.$password;
    //  echo '<br>Agreement: '.$agreement;

     //upload data to server 
     $signupResult = $signup->save(array(
         "firstname"    =>$fname,
         "lastname"     =>$lname,
         "password"     =>$password,
         "email"        =>$email,
         "agreement"    =>$agreement
     ));

     //if the email already exist in the database then return message to sign up screen
     if($signupResult->error){
        $_SESSION['errors'] = $signupResult['msg'];
        header('Location:../signup.php');
     }

     //if user is stored in the database then return to login to allow new user to sign in with 
     //new account profile
     if($signupResult->success){
        $_SESSION['email'] = $email;
        header('Location:../login.php');
     }

     break;
 }
 



