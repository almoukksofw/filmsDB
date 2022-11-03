<?php

namespace core;
use \core\Database;
use PDO;

abstract class Model {
    
    
    protected $pdo;      
    private $data;         
    private $primary_name; 
    private $primary_type; 
    
    private $errors;      
    
    

    public function __construct($primary_def = ['id', PDO::PARAM_INT]){
        $this->pdo = Database::getInstance()->getPdo();
        $this->primary_name = $primary_def[0];
        $this->primary_type = $primary_def[1];
    }
   
    public function getData(){
        return $this->data;
    }

    protected function getDataField($name){
        return $this->data[$name] ?? NULL;
    }

    protected function getPrimaryValue(){
        return $this->getDataField($this->primary_name);
    }


    public function __get($name){
        return $this->getDataField($name);
    }
    
    protected function setData($value){ // value is a string met object
        foreach ($value as &$str){
            $str = utf8_encode($str);
        }
        
        $this->data = $value;
    }
    
    protected function setDataField($name, $value)
    {
        $this->data[$name] = $value;
    }
    
  
    protected function setError($name, $value)
    {
        $this->errors[$name] = $value;
    }
    
    public function getErrors()
    {
        return $this->errors ?? [];
    }
    
    public function isValid()
    {
        return count($this->getErrors()) == 0;
    }
    
    
 
    
    public function load(&$success){
        $query = 
        ' SELECT * FROM ' . $this::TABLENAME . ' WHERE ' . $this->primary_name . ' = :pk';
        $statement = $this->pdo->prepare($query);
        $statement->bindValue(':pk', $this->getPrimaryValue(), $this->primary_type);
        $statement->execute();
        $data = $statement->fetch(PDO::FETCH_ASSOC);
        $success = ($data != false);
        if ($success)
        {
            $this->setData($data);
        }
    }
    

    static public function index() {
        $pdo = Database::getInstance()->getPdo(); // getting the class          
        $class = get_called_class();                       

        $query ='SELECT *FROM ' . $class::TABLENAME . '';
        
        $statement = $pdo->prepare($query);                
        $statement->execute();

        $records = $statement->fetchAll(PDO::FETCH_ASSOC);  
        $objects = [];                                   

        foreach ($records as $record){
            $object = new $class();                         
            $object->setData($record);                    
            $objects[] = $object;                         
        }

        return $objects;
    }
    
}