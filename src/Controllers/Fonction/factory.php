<?php

namespace Controllers\Fonction;

require '../src/controllers/fonction/params.php';

class factory
{

    private static $_instance;

    public $className;

    public $titleP;

    public $contentP;

    private $valid;

    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new factory();
        }
        return self::$_instance;
    }

    public function userLog($key, $type, $input)
    {
        $this->className = 'Controllers\login' . ucfirst($type);
        if($type == 'Send' && $key != 'logout')
        {
        $classUser = 'Model\login' . ucfirst($type);
        echo $type;
        $cu = new $classUser;
        $re = $cu->getUser($input['email']);
        $n = new $this->className($input, $re);
        $n->loginSend();
        }else if($key == 'logout'){
            session_destroy();
            header('Location: /');
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
        return $n->$c($this->titleP, $this->contentP);
    }

    }

    public function user($type)
    {
        $classUser = 'Model\user' . ucfirst($type);
        return new $classUser();
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
