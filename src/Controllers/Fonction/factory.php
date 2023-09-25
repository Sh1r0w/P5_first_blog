<?php

namespace Controllers\Fonction;

require '../src/controllers/fonction/params.php';


class factory
{

    private static $_instance;

    public $pictureP;

    public $pdf;

    public $titleP;

    public $chapoP;

    public $contentP;

    public $authorP;

    private $instance;

    private $contentC;

    private $nameSpace;

    private $classN;

    public $result;

    public $read;

    /**
     * The getInstance function returns an instance of the factory class, creating one if it doesn't
     * already exist.
     * 
     * @return The getInstance() function is returning an instance of the factory class.
     */
    public static function getInstance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new factory();
        }
        return self::$_instance;
    }

    /**
     * The function creates an instance of a class based on the provided namespace and class name.
     * 
     * @param nameSpace The `nameSpace` parameter is a string that represents the namespace of the
     * class you want to instantiate. Namespaces are used to organize classes and avoid naming
     * conflicts.
     * @param classN The parameter `` represents the name of the class that you want to
     * instantiate.
     * 
     * @return the instance of the class specified by the namespace and class name provided as
     * arguments.
     */
    public function instance($nameSpace, $classN)
    {
        $this->result = $nameSpace . DIRECTORY_SEPARATOR . $classN;
        if ($this->instance != $this->result) {
            $this->instance = new $this->result($this->getInstance());
        }
        return $this->instance;
    }

    public function logout()
    {
        session_destroy();
        header('location: /');
    }


    /**
     * The code defines several functions related to connect functionality in a PHP application.
     * 
     * @param type The "type" parameter is not used in any of the functions provided. It seems to be an
     * unused parameter in the code.
     * @param input The "input" parameter is an array that contains the user's connect credentials, such
     * as their email and password.
     */
    public function connectSend($input)
    {
        self::instance('Controllers\Connect', 'connectSendControllers')->connectSend($input, self::getInstance(), self::instance('Model\Connect', 'connectSendModel'));
    }

    public function connectCreateSend($input, $id, $key)
    {

        self::instance('Controllers\Connect', 'connectCreateSendControllers')->connectCreateSend($input, self::connectCheck($input), self::getInstance(), self::instance('Model\Connect', 'connectCreateModel'));
    }

    public function connectCheck($input)
    {
        return self::instance('Model\Connect', 'connectCheckModel')->connectCheck($input, self::getInstance());
    }

    public function connectCheckCount()
    {
        return self::instance('Model\Connect', 'connectCheckCountModel');
    }

    
    /**
     * The code defines several functions related to handling post in a PHP application.
     * 
     * @param type The "type" parameter is used to determine the specific action to be performed on the
     * post. It could be values like "send", "update", "list", "delete", or "read".
     * @param input The "input" parameter is a variable that contains the input data for the post. It
     * could be an array, object, or any other data structure that holds the necessary information for
     * creating or updating a post.
     * @param id The "id" parameter is used to identify a specific post. It is typically an integer
     * value that represents the unique identifier of a post in a database or system.
     * @param key The "key" parameter is not used in any of the functions provided. It is not clear
     * what its purpose is or how it should be used.
     */
    public function postSend($input, $id, $key)
    {
        self::instance('Controllers\Post', 'postSendControllers')->postSend(self::titlePost($input), self::chapoPost($input), self::contentPost($input), self::authorPost($input), self::getInstance());
    }

    public function postUpdate($input, $id, $key)
    {
        self::instance('Controllers\Post', 'postUpdateControllers')->postUpdate($input, $id, self::getInstance());
    }

    public function postList()
    {
        return self::instance('Controllers\Post', 'postListControllers')->postList(self::instance('Model\post', 'postListModel'));
    }

    public function postDelete($input, $id, $key)
    {
        self::instance('Controllers\Post', 'postDeleteControllers')->postDelete($id, self::getInstance());
    }

    public function postRead($id)
    {
        if (isset($id)) {
            return self::instance('Controllers\Post', 'postReadControllers')->postReadControllers(self::instance('Model\Post', 'postReadModel')->postReadModel($id, self::getInstance()));
        }
    }

/**
 * The userUpdate function calls a method in the User controller with the given type and input
 * parameters, along with the connect check count and the name of the picture post.
 * 
 * @param type The "type" parameter is a string that specifies the type of update operation to be
 * performed on the user. It could be "create", "update", "delete", or any other operation that is
 * defined in the "User" controller.
 * @param input The  parameter is the data that you want to update for the user. It could be an
 * array or an object containing the updated information for the user.
 */
    public function userUpdate($input, $id, $key)
    {
        self::instance('Controllers\User', 'userSendControllers')->userSend($input, self::connectCheckCount(),self::getInstance(), self::instance('Model\User', 'userPushModel'));
    }

    public function updatePass($input, $id, $key)
    {
        self::instance('Controllers\User', 'updatePassControllers')->updatePass($input, self::getInstance(), self::instance('Model\User', 'updatePassModel'));
    }

    /**
     * The code defines several functions related to commenting, including sending a comment, reading a
     * comment, counting comments, and deleting a comment.
     * 
     * @param type The "type" parameter is used to determine the specific action to be performed in the
     * commentSend and commentDelete methods. It could be a string value indicating the type of action,
     * such as "create", "update", or "delete".
     * @param input The "input" parameter is a variable that represents the input data for the comment.
     * It could be a string or an array containing the comment content, author information, or any
     * other relevant data for the comment.
     * @param id The "id" parameter is used to identify a specific comment. It is typically an
     * identifier or a unique value that helps to locate and manipulate a specific comment in the
     * system.
     * 
     * @return The code is returning the result of the method calls in the respective functions.
     */
    public function commentSend($input, $id)
    {
        return self::instance('Controllers\Comment', 'commentSendControllers')->commentSend(self::contentComment($input), $id, self::getInstance());
    }

    public function commentRead($id)
    {

        if (isset($id)) {

            return self::instance('Controllers\Comment', 'commentReadControllers')->commentReadControllers(self::instance('Model\Comment', 'commentReadModel')->commentRead($id, self::getInstance()));
        }
    }

    public function commentCount()
    {
        return self::instance('Controllers\Comment', 'commentCountControllers');
    }

    public function commentDelete($input, $id, $key)
    {
        self::instance('Controllers\Comment', 'commentDeleteControllers')->commentDelete($id, $key, self::getInstance());
    }

    public function commentUpdate($input, $id, $key)
    {
        self::instance('Controllers\Comment', 'commentUpdateControllers')->commentUpdateControllers($input, $id, $key, self::getInstance(), self::instance('Model\Comment', 'commentUpdateModel'));
    }

    
    /**
     * The code defines several functions for managing users, post, and comments in an admin panel.
     * 
     * @return The adminList() function returns the result of calling the userList() function on an
     * instance of the 'adminControllers' class with an instance of the 'adminUserListModel' class as a
     * parameter.
     */
    public function adminList()
    {
        return self::instance('Controllers\Admin', 'adminControllers')->userList(self::instance('Model\Admin', 'adminUserListModel'));
    }

    public function adminUserUpdate($input, $id, $key)
    {
        self::instance('Controllers\Admin', 'adminUserControllers')->userUpdate($id, self::instance('Model\Admin', 'adminUserUpdateModel')->adminUpdate($key), self::getInstance());
    }

    public function adminUserDelete($input, $id, $key)
    {
        self::instance('Controllers\Admin', 'adminUserDeleteControllers')->adminUserDelete($id, self::getInstance());
    }

    public function adminPostList()
    {
        return self::instance('Controllers\Admin', 'adminPostListControllers')->postList(self::instance('Model\Admin', 'adminPostListModel'));
    }

    public function adminPostUpdate($input, $id, $key)
    {
        self::instance('Controllers\Admin', 'adminPostUpdateControllers')->postUpdate($id, self::instance('Model\Admin', 'adminPostUpdateModel')->postUpdate($key), self::getInstance());
    }

    public function adminPostDelete($input, $id, $key)
    {
        self::instance('Controllers\Admin', 'adminPostDeleteControllers')->postDelete($id, self::instance('Model\Admin', 'adminPostDeleteModel')->postDelete($id), self::getInstance());
    }

    public function adminCommentList()
    {

        return self::instance('Controllers\Admin', 'adminCommentListControllers')->commentList(self::instance('Model\Admin', 'adminCommentListModel'));
    }

    public function adminCommentUpdate($input, $id, $key)
    {
        self::instance('Controllers\Admin', 'adminCommentUpdateControllers')->commentUpdate($id, self::instance('Model\Admin', 'adminCommentUpdateModel')->commentUpdate($key), self::getInstance());
    }

    public function adminCommentDelete($input, $id, $key)
    {
        self::instance('Controllers\Admin', 'adminCommentDeleteControllers')->commentDelete($id, self::getInstance());
    }



    /**
     * The getProfil function retrieves a user's profile by calling the getUser function from the User
     * model and passing the result to the getUser function from the User controller.
     * 
     * @param id The parameter "id" is the unique identifier of the user whose profile we want to
     * retrieve.
     * 
     * @return the result of calling the `getUser` method on the `getProfilControllers` instance,
     * passing the result of calling the `getUser` method on the `getProfilModel` instance with the
     * given `` and the current instance as arguments.
     */
    public function getProfil($id)
    {
        return self::instance('Controllers\User', 'getProfilControllers')->getUser(self::instance('Model\User', 'getProfilModel')->getUser($id, self::getInstance()));
    }

    /**
     * The code defines several functions in PHP for handling post and comment data.
     * 
     * @param input The input parameter is an array that contains the data for the respective fields.
     * Each function takes this input array as a parameter and assigns the corresponding value to the
     * respective class property. The function then returns the assigned value.
     * 
     * @return The functions titlePost, contentPost, chapoPost, and authorPost are returning the values
     * of the corresponding input fields (title, content, chapo, and author) respectively. The function
     * contentComment is returning the value of the input field comment.
     */
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

    /**
     * Send email 
     * 
     */

     public function sendEmail($input, $id, $key)
     {
        self::instance('Controllers\Mail', 'sendEmail')->sendEmail($id);
     }

}
