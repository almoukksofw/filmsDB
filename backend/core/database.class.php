<?php


namespace core;
use PDO;



class Database{
    private static $selfself;
    
    private $pdo;

    private function __construct(){
		$dsn = 'mysql:host=localhost; dbname=films_db';
		$this->pdo = new PDO($dsn, 'noorderpoort', 'toets');
    }



    public static function getInstance(){
        if(!isset(self::$selfself)){
            self::$selfself=new self();
        }
        return self::$selfself;
    }
    
    public function getPdo(){
        return $this->pdo; 
    }
}

?>