<?php

namespace Controllers\Fonction;

require '../src/controllers/fonction/params.php';

class factory{

    private $database;
    private $_instance;
    private $db_instance;

    public static function getInstance()
    {
        if(is_null(self::$_instance)){
            self::$_instance = new factory();
        }
        return self::$_instance;

    }

    public function posts($type){
        $className = 'Controllers\posts' . ucfirst($type);
        return new $className();

    }

    public static function user($type){
        $className = 'Model\user' . ucfirst($type);
        return new $className();
    }

    public function db(){
        if(is_null($this->db_instance)){
            $n = new db;
            $this->db_instance = $n::connectDatabase();
        }
        return $this->db_instance;
    }
}

