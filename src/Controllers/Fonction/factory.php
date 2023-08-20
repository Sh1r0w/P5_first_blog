<?php

namespace Controllers\Fonction;

require '../src/controllers/fonction/params.php';

class factory
{

    private static $_instance;

    public $className;

    public $titleP;

    public $contentP;

    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new factory();
        }
        return self::$_instance;
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
}
