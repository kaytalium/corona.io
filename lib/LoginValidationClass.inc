<?php

class LoginValidationClass{
    
    //Public vars
    public $userName;
    public $password;

    //Private vars
    private $dc; //Database connction
    private $passwordHash;
    private $salt;
    private $cryptpass;
    
    /**
     * Class constructor setting up the database connection 
     */
    public function __construct(){
        $this->dc = new DatabaseConnection();
    }


    /**
     * check the database if user exist 
     * if yes return personal info 
     * else return message
     */
    private function validateUser(){
       
        $statementResult = $this->dc->executeStatementReturnResult("SELECT p.firstname, p.lastname, p.avatar, p.password, p.salt, p.pindex WHERE p.username=:username", array('username'=>$this->userName));

        //check the result of the request to database
        if(isset($statementResult) && !empty($statementResult)){
            //We found a match of the username in our db, now we return the result to calling function
            return array("state"=>true, "data"=>$statementResult);
        }else{
            return array("state"=>false, "data"=>"invaild user");
        }
    }

    /**
     *
     */
    private function validatePassword($dbResult = array()){

        $paswordHash = $dbResult[0]['password'];
        $salt = $dbResult[0]['salt'];

        //encrypt password from user with key from db
        $cryptpass = crypt($this->password, $salt);
        return ($cryptpass==$passwordHash? true: false);
    }

    /**
     *
     */
    private function userProfile($dbResult = array()){
        return array(
            "firstname"=>$dbResult[0]['firstname'],
            "lastname"=>$dbResult[0]['lastname'],
            "avatar"=>$dbResult[0]['avatar'],
            "personID"=>$dbResult[0]['pindex']
        );
    }

    /**
     *
     */
    public function loginUser(){

        //validate the username
        $userExist = $this->validateUser();
        #print_r($userExist);
        if($userExist['state']){//user exist true
            //we now check if password matches
            $passwordMatch = $this->validatePassword($userExist['data']);

            if($passwordMatch){
                return array('error'=>false, 'msg'=>$this->profile($userExist['data']));
            }else{
                return array('error'=>true, 'msg'=>'invalid password');
            }
            
        }else{
            return array('error'=>true, 'msg'=>"invalid username");
        }

        
    }
}