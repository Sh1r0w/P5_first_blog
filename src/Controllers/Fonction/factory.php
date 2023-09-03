<?php

namespace Controllers\Fonction;

require '../src/controllers/fonction/params.php';

/* The `class factory` is a PHP class that serves as a factory for creating instances of other classes.
It contains various methods for creating and manipulating objects of different types, such as login,
posts, comments, and user updates. It also has methods for handling sessions and authentication. The
`getInstance` method ensures that only one instance of the `factory` class is created, following the
Singleton design pattern. */
class factory
{

    private static $_instance;

    public $className;

    public $pictureP;

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
            $this->className = 'Controllers\Login\\' . $type;
            $userExist = self::instance('Model\Login', $type)->getUser($input['email']);
            $n = new $this->className($input, $userExist);
            $n->$type();

    }

    public function loginCreateSend($type, $input)
    {
        $this->className = 'Controllers\Login' . $type;
        new $this->className($input, self::loginCheck($input), self::getInstance());
    }

    public function loginCheck($input)
    {
        return self::instance('Model\Login', 'loginCheck')->loginCheck($input);
    }

    public function loginCheckCount()
    {
        return self::instance('Model\Login', 'loginCheckCount')->loginCheckCount();
    }

    public function postsSend($type, $input)
    {
        if ($type != 'postsSend') {
            return self::instance('Controllers\Posts', 'postsSendControllers');
        } elseif ($type == 'postsSend') {
            $n = self::instance('Controllers\Posts', 'postsSendControllers');
            return $n->$type(self::titlePost($input), self::chapoPost($input), self::contentPost($input), self::authorPost($input), self::picturePost()->name);
        }
    }

    public function postsUpdate($type, $input, $id)
    {
        self::instance('Controllers\Posts', 'postsUpdateControllers')->$type($input, $id);
    }

    public function postsList($type)
    {
        return self::instance('Controllers\Posts', 'postsListControllers')->$type(self::instance('Model\Posts', 'postsListModel'));
    }

    public function postsDelete($type, $input, $id, $key)
    {
        self::instance('Controllers\Posts', 'postsDeleteControllers')->$type($id);
    }


    public function commentSend($type, $input, $id)
    {
            return self::instance('Controllers\Comment', 'commentSendControllers')->$type(self::contentComment($input), $id);
        
    }

    public function userUpdate($type, $input)
    {
        self::instance('Controllers\User', $type)->$type($input, self::loginCheckCount(), self::picturePost()->name);
    }

    public function postsRead($id)
    {
        if(isset($id)){
            return self::instance('Controllers\Posts', 'postsReadControllers')->postsReadControllers(self::instance('Model\Posts', 'postsReadModel')->postsReadModel($id));
        }
    }

    public function commentRead($id)
    {
            
        if(isset($id))
        {
            
            return self::instance('Controllers\Comment', 'commentReadControllers')->commentReadControllers(self::instance('Model\Comment', 'commentReadModel')->commentRead($id));
        }
    }

    public function commentCount()
    {
        return self::instance('Controllers\Comment', 'commentCountControllers')->countComment();
    }

    public function commentDelete($type, $input, $id, $key)
    {
        self::instance('Controllers\Comment', 'commentDeleteControllers')->$type($id, $key);
    }

    public function adminList()
    {
        return self::instance('Controllers\Admin', 'adminControllers')->userList(self::instance('Model\Admin','adminUserListModel'));
    }

    public function adminUserUpdate($type, $input, $id, $key)
    {
         self::instance('Controllers\Admin', 'adminUserControllers')->userUpdate($id, self::instance('Model\Admin', 'adminUserUpdateModel')->adminUpdate($key));
    }

    public function picturePost()
    {
        $this->pictureP = self::instance('Controllers\Fonction', 'img');
        return $this->pictureP;
        
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
