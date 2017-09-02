<?php

class SignUp{

    private $dc;

    /**
     * class constructor
     */
    public function __construct(){
        $this->dc = new DatabaseConnection();
    }

    public function save($userData = array()){
        
        //check if this email was already use by another user
        if($this->isUserExist($userData->email)){
            return array("error"=>true, "msg"=>"This user already exist");
        }else{//user not found in database
            //encode password
            $password = new Password($userData->password);
            
            //insert query
            $query = "INSERT INTO person(firstname, lastname, password, salt, email, agreement) value(:firstname, :lastname, :encodedPassword, :salt, :email, :agreement)";

            //push to db
            $result = $dc->CRUDData($query,$userData, $password->encodedSecret);  
            return array("success"=>true,"msg"=>"profile created");
        }         
    }



    /**
     * Check if user already exist in database
     */
     private function isUserExist($email){

        //query 
        $statement = $dc->executeStatementReturnResult("SELECT email from person where email=:email",array('email'=>$email));

        if(empty($statement)){
            return false;
        }else{
            return true;
        }
     }
}
