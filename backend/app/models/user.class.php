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
        $stmt->bindValue(':password_hash', $this->getDataField('password_hash'), PDO::PARAM_STR);
        $stmt->execute();

        $this->setId($this->pdo->lastInsertId());
        
    }

    public function loadByEmail(){
        $query=
        '
        SELECT * FROM users WHERE email=:email
        ';
        $stmt=$this->pdo->prepare($query);
        $stmt->bindValue(':email',$this->email, PDO::PARAM_STR);
        $stmt->execute();
        $data=$stmt->fetch(PDO::FETCH_ASSOC);
        $success=($data!=false);
        if($success){
            $this->setData($data);
        }
    }



}
