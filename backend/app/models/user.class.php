<?php

namespace app\models;

use core\Model;
use core\Token;
use PDO;

class User extends Model {

    const TABLENAME = 'users';

    private $token;             
    private $ratings;       
    private $name;
    private $email;
    private $password;
    private $passwordRepeat;
    
    

    public function __construct(){
        parent::__construct();
    }

    public function setId($value){
        $this->setDataField('id',$value);
    }

    public function setName($value){
        $this->setDataField('name',$value);
    }

    public function setEmail($value){
        $this->setDataField('email',$value);
    }

    public function setPassword($value){
        $this->password=$value;
    }
    
    public function setPasswordRepeat($value){
        $this->passwordRepeat=$value;
    }
    public function setPasswordHash($value){
        $this->setDataField('password_hash',$value);
    }


    public function getToken(){
        if(!isset($this->token)){
            $this->token=new Token();
            $this->token->setIdUser($this->id);
            $this->token->loadByUser($success);
        }
        return $this->token;
    }

    public function getRatings(){
        if(!isset($this->ratings)){
            $this->rating=Rating::indexByUser($this->id);
        }
        return $this->ratings;
    }



    public function getRatingByProduct(){
        foreach($this->getRatings() as $rating){
            if($rating->id_product==$id_product){
                return $rating;
            }
        }
    }


    public function insert(){
        $query=
        '
        INSERT INTO users (name, email, password_hash) VALUES (:name, :email, :password_hash)
        ';

        $stmt=$this->pdo->prepare($query);
        $stmt->bindValue(':name', $this->getDataField('name'), PDO::PARAM_STR);
        $stmt->bindValue(':email',$this->getDataField('email'), PDO::PARAM_STR);
        $stmt->bindValue(':password_hash', $this->password_hash, PDO::PARAM_STR);
        $stmt->execute();

        $this->setId($this->pdo->lastInsertId());
        
    }

    public function login(){
        if ($this->getDataField('email') == ''){
            $this->setError('email', 'e-mailadres is niet ingevuld');
        }else{  
            $this->loadByEmail($success);

            if (!$success){
                // $this->setError('email', 'e-mailadres is niet geregistreerd');
                // header("Location: https://www.google.com");
            // exit();
            }
            elseif (!password_verify($this->getDataField('password'), $this->password_hash))
            {
                $this->setError('password', 'wachtwoord is onjuist');   
                                header("Location: https://www.google.com");

            }

        }

        if ($this->isValid())
        {
            // $this->getToken()->regenerate();
            return true;
        }
    }



    private function loadByEmail(&$success)
    {
        $query = 
        '
            SELECT *
            FROM users 
            WHERE email = :email
        ';
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':email', $this->email, PDO::PARAM_STR);
        $statement->execute();
        $data = $statement->fetch(PDO::FETCH_ASSOC);
        $success = ($data != false);
        if ($success)
        {
            $this->setData($data);
            return true;
        }
    }




    private function validatePassword()
    {
        if($this->password == ''){
            $this->setError('password','password is leg');
        }
    }


    private function validateName()
    {
        if ($this->getDataField('name') == '')
        {
            $this->setError('name', 'naam is leeg');
        }    
    }

    /** email moet voldoen aan de eisen voor een e-mailadres, en mag niet al geregistreerd zijn */
    private function validateEmail()
    {
        // if (!filter_var($this->email, FILTER_VALIDATE_EMAIL))
        // {
        //     $this->setError('email', 'e-mailadres is ongeldig');
        // }
        // else
        // {
        //     $user = new User();
        //     $user->setEmail($this->email);
        //     $user->loadByEmail($success);
        //     if ($success)
        //     {
        //         $this->setError('email', 'e-mailadres is al geregistreerd');
        //     }
        // }
        if ($this->getDataField('email') == '')
        {
            $this->setError('email', 'naam is leeg');

        }

    
    }


    public function register()
    {
        // $this->validateName();
        // $this->validateEmail();
        // $this->validatePassword();
        
        // if ($this->isValid())
        // {
            $this->setPasswordHash(password_hash($this->password, PASSWORD_DEFAULT));
            
            $this->insert();
 
            // $this->getToken()->generate();
        // }
        // else{
        //     header("Location: https://www.google.com");
        //     exit();
        // }
    }

    
 




}
