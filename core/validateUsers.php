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
  * Iniatilize the login class to validate user. 
  */
 $login = new LoginValidationClass(); 

/**
 * Base on the request page 
 */
 switch($request_page){
     case 'login':
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

     case 'signup';
     echo 'Thanks for signing up';
     break;
 }
 



