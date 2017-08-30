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
 * Set the post data from user that ie.
 * $userName
 * $password
 */
 $userName=$_POST['usrnme'];
 $password=$_POST['pswrd'];

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
     $login->userName=$userName;
     $login->password=$password;
    
     $login_result = $login->loginUser();
     
     break;

     case 'signup';
     break;
 }
 

echo '<br/>Username: '.$userName.'<br>';
echo 'Password: '.$password.'<br>';
echo 'Request Page: '.$request_page;   

