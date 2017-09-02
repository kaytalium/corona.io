<?php

class Password{

    private $userPassword;


    public function __construct($password){
        //get password user submitted 
        $this->userPassword = $password;
    }

    public function encodedSecret(){

        //Update new password and activate account
		if(CRYPT_BLOWFISH != 1) {
            throw new Exception("bcrypt not supported in this installation. See http://php.net/crypt"); //This is vital for Bcyrpt to work so leave it!
        }

        $salt = mcrypt_create_iv(12, MCRYPT_DEV_URANDOM);
        $cryptpass = crypt($password, $salt); //Hashes the password they entered!


        //Return encoded password and salt 
        return array("encodedPassword"=>$cryptpass,"salt"=>$salt);
    }
}