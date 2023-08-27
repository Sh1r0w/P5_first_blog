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

    private $contentC;

    private $nameSpace;

    private $classN;

    public $result;

    public $read;

    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new factory();
        }
        return self::$_instance;
    }

    public function instance($nameSpace, $classN)
    {
        $this->result = $nameSpace . DIRECTORY_SEPARATOR . $classN;
        if ($this->instance != $this->result) {
            $this->instance = new $this->result;
        }
        return $this->instance;
    }

    public function logout()
    {
        session_destroy();
        header('Location: /');
    }


    public function loginSend($type, $input)
    {
        $this->className = 'Controllers\\' . $type;
            $userExist = self::instance('Model', $type)->getUser($input['email']);
            $n = new $this->className($input, $userExist);
            $n->$type();

    }

    public function loginCreateSend($type, $input)
    {
        $this->className = 'Controllers\\' . $type;
        new $this->className($input, self::getInstance());
    }

    public function postsSend($type, $input)
    {
       
        $this->className = 'Controllers\\' . $type;
        if ($type != 'postsSend') {
            echo 'ok';
            return self::instance('Controllers', $type);
        } elseif ($type == 'postsSend') {
            $n = self::instance('Controllers', $type);
            return $n->$type(self::titlePost($input), self::chapoPost($input), self::contentPost($input), self::authorPost($input));
        }
    }

    public function postsUpdate($type, $input, $id)
    {
        $this->className = 'Controllers\\' . $type;
        new $this->className($input, $id);
    }

    public function postsList($type)
    {
        $this->className = 'Controllers\\' . $type;
        return self::instance('Controllers', $type);
    }

    public function postsDelete($type, $input, $id)
    {
        $this->className = 'Controllers\\' . $type;
        new $this->className($id);
    }


    public function commentSend($type, $input, $id)
    {

        $this->className = 'Controllers\\' . $type;
            return self::instance('Controllers', $type)->$type(self::contentComment($input), $id);
        
    }

    public function userUpdate($type, $input, $id)
    {
        self::instance('Controllers', $type)->$type($input);
    }

    public function postsRead($id)
    {
        if(isset($id)){
            return self::instance('Controllers', 'postsReadControllers')->postsReadControllers(self::instance('Model', 'postsRead')->postsRead($id));
        }
    }

    public function commentRead($id)
    {
            
        if(isset($id))
        {
            return self::instance('Controllers', 'commentReadControllers')->commentReadControllers(self::instance('Model', 'commentRead')->commentRead($id));
        }
    }

    public function countComment()
    {
        return self::instance('Model', 'countComment')->countComment();
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

    public function contentComment($input)
    {
        return $this->contentC = $input['comment'];
    }

    public function validSession($valid)
    {
        $this->valid = $valid;
        return $this->valid;
    }



    public function openSession($data)
    {
        if ($this->valid == '1') {
            new session($data);
        }
    }
}
