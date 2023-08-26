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


    public function userLog($type, $input)
    {
        $this->className = 'Controllers\login' . ucfirst($type);
        if ($type == 'Send') {
            echo 'test';
            $userExist = self::instance('Model', 'login' . ucfirst($type))->getUser($input['email']);
            $n = new $this->className($input, $userExist);
            $s = 'login' . ucfirst($type);
            $n->$s();
        } elseif ($type == 'CreateSend') {

            new $this->className($input, self::getInstance());
        }
    }

    public function posts($type, $input = null)
    {
        $this->className = 'Controllers\posts' . ucfirst($type);
        if ($type != 'Send') {
            return self::instance('Controllers', 'posts' . ucfirst($type));
        } elseif ($type == 'Send') {
            $c = 'posts' . ucfirst($type);
            $n = self::instance('Controllers', 'posts' . ucfirst($type));
            return $n->$c(self::titlePost($input), self::chapoPost($input), self::contentPost($input), self::authorPost($input));
        }
    }


    public function comment($type, $id)
    {

        $this->className = 'Controllers\comment' . ucfirst($type);
        if ($type == 'Send') {
            $c = 'comment' . ucfirst($type);
            return self::instance('Controllers', 'comment' . ucfirst($type))->$c($this->contentC, $id);
        }
    }

    public function user($classN, $type, $input = null)
    {
        $s = $classN . ucfirst($type);
        self::instance('Controllers', $classN . ucfirst($type))->$s($input);
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
        $this->contentC = $input['comment'];
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
