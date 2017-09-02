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
        if($this->isUserExist($userData['email'])){
            return array("error"=>true, "msg"=>"This user already exist");
        }else{//user not found in database
            //encode password
            $password = new Password($userData['password']);
            
            //insert query
            $query = "INSERT INTO person(firstname, lastname, password, salt, email, agreement, AvatarUrl) VALUES(:firstname, :lastname, :password, :salt, :email, :agreement, :avatarUrl)";

            $cleanData = $this->readyForStore($userData, $password->encodedSecret());
            #print_r($cleanData);
            //push to db
            $result = $this->dc->CRUDData($query,$cleanData);  
            
            return array("success"=>true,"msg"=>"profile created", "dbResult"=>$result);
        }         
    }



    /**
     * Check if user already exist in database
     */
     private function isUserExist($email){

        //query 
        $statement = $this->dc->executeStatementReturnResult("SELECT email from person where email=:email",array('email'=>$email));

        if(empty($statement)){
            return false;
        }else{
            return true;
        }
     }

     /**
      * create on array with all the data needed to store 
      */
      private function readyForStore($userData = array(), $secret= array()){
          return array(
            "firstname"    =>$userData['firstname'],
            "lastname"     =>$userData['lastname'],
            "password"     =>$secret['encodedPassword'],
            "salt"         =>$secret['salt'],
            "email"        =>$userData['email'],
            "agreement"    =>$userData['agreement'],
            "avatarUrl"    =>""
          );
      }
}
