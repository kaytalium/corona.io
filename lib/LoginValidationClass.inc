<?php

class LoginValidationClass{
    public $userName;
    public $password;

    public function loginUser(){
        return array('error'=>0,'result'=>1);
    }
}