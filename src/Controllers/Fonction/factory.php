<?php

namespace Controllers\Fonction;

require '../src/controllers/fonction/params.php';

class factory
{

    private static $_instance;

    public $className;

    public $titleP;

    public $chapoP;

    public $contentP;

    public $authorP;

    private $valid;

    private $classUser;

    private $instance;

    private $key;

    private $key2;

    public $result;

    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new factory();
        }
        return self::$_instance;
    }

    public function instance($key, $key2){
        
        if (is_null($this->instance)) {          
            $this->result = $key . DIRECTORY_SEPARATOR . $key2;     
            $this->instance = new $this->result;

        }
        
        return $this->instance;
        
    }

    public function logout()
    {
        session_destroy();
        header('Location: /');
    }
    

    public function userLog($type, $input)
    {
        $this->className = 'Controllers\login' . ucfirst($type);
        if($type == 'Send'){
            echo 'test';
        $classUser = 'Model\login' . ucfirst($type);
        $cu = new $classUser;
        $re = $cu->getUser($input['email']);
        $n = new $this->className($input, $re);
        $s = 'login' . ucfirst($type);
        $n->$s();
    }elseif($type == 'CreateSend'){

        new $this->className($input);
    }
        
       // return $n($input, $re);
    }

    public function posts($type)
    {
        $this->className = 'Controllers\posts' . ucfirst($type);
        if($type != 'Send'){
        return new $this->className;
    }else{
        $c = 'posts' . ucfirst($type);
        $n = new $this->className;
        return $n->$c($this->titleP, $this->chapoP,$this->contentP, $this->authorP);
    }

    }

    public function user($key, $type, $input = null)
    {
        echo 'ok1';
        echo $key;
        $valid = $key . ucfirst($type);
        if(file_exists(dirname(dirname(__DIR__)). DIRECTORY_SEPARATOR . 'Model' . DIRECTORY_SEPARATOR . $valid . '.php')){
        $this->classUser = 'Model'. DIRECTORY_SEPARATOR. $key . ucfirst($type);
        return new $this->classUser();
        }else{
            echo 'ok2';
        $this->classUser = 'Controllers'. DIRECTORY_SEPARATOR . $key . ucfirst($type);
        echo $this->classUser;
        $n = new $this->classUser;
        $s = $key . ucfirst($type);
        $n->$s($input);
        }
        

    }
    
    public function titlePost($input)
    {
        $this->titleP = $input['title'];
        return $this->titleP;
    }

    public function contentPost($input)
    {
       
        $this->contentP = $input['content'];
        return $this->contentP;
    }

    public function chapoPost($input)
    {
        var_dump($input);
        $this->chapoP = $input['chapo'];
        return $this->chapoP;
    }

    public function authorPost($input)
    {
        $this->authorP = $input['author'];
        return $this->authorP;
    }

    public function validSession($valid)
    {
        $this->valid = $valid;
        return $this->valid;
    }

    public function openSession($data)
    {
        if($this->valid == '1')
        {
            new session($data);
        }
    }
}
