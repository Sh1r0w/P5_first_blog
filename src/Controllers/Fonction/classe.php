<?php

namespace Controllers\Fonction;

class Factory
{
    public static $selfInstance;

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
     * The getInstance function returns an instance of the Factory class, creating one if it doesn't
     * already exist.
     *
     * @return The getInstance() function is returning an instance of the Factory class.
     */
    public static function getInstance()
    {
        if (is_null(self::$selfInstance)) {
            self::$selfInstance = new Factory();
        }
        return self::$selfInstance;
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
        self::instance(
            'Controllers\Connect',
            'ConnectSendControllers'
        )->connectSend(
            $input,
            self::getInstance(),
            self::instance(
                'Model\Connect',
                'ConnectSendModel'
            )
        );
    }

    public function connectCreateSend($input)
    {

        self::instance(
            'Controllers\Connect',
            'ConnectCreateSendControllers'
        )->connectCreateSend(
            $input,
            self::connectCheck($input),
            self::getInstance(),
            self::instance(
                'Model\Connect',
                'ConnectCreateModel'
            )
        );
    }

    public function connectCheck($input)
    {
        return self::instance(
            'Model\Connect',
            'ConnectCheckModel'
        )->connectCheck(
            $input,
            self::getInstance()
        );
    }

    public function connectCheckCount()
    {
        return self::instance(
            'Model\Connect',
            'ConnectCheckCountModel'
        );
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
        self::instance(
            'Controllers\Post',
            'PostSendControllers'
        )->postSend(
            self::titlePost($input),
            self::chapoPost($input),
            self::contentPost($input),
            self::authorPost($input),
            self::getInstance()
        );
    }

    public function postUpdate($input, $id, $key)
    {
        self::instance(
            'Controllers\Post',
            'PostUpdateControllers'
        )->postUpdate(
            $input,
            $id,
            self::getInstance()
        );
    }

    public function postList()
    {
        return self::instance(
            'Controllers\Post',
            'PostListControllers'
        )->postList(
            self::instance(
                'Model\post',
                'PostListModel'
            )
        );
    }

    public function postDelete($input, $id, $key)
    {
        self::instance(
            'Controllers\Post',
            'PostDeleteControllers'
        )->postDelete(
            $id,
            self::getInstance()
        );
    }

    public function postRead($id)
    {
        if (isset($id)) {
            return self::instance(
                'Controllers\Post',
                'PostReadControllers'
            )->postReadControllers(
                self::instance(
                    'Model\Post',
                    'PostReadModel'
                )->postReadModel(
                    $id,
                    self::getInstance()
                )
            );
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
        self::instance(
            'Controllers\User',
            'UserSendControllers'
        )->userSend(
            $input,
            self::connectCheckCount()->result,
            self::getInstance(),
            self::instance(
                'Model\User',
                'UserPushModel'
            )
        );
    }

    public function updatePass($input, $id, $key)
    {
        self::instance(
            'Controllers\User',
            'UpdatePassControllers'
        )->updatePass(
            $input,
            self::getInstance(),
            self::instance(
                'Model\User',
                'UpdatePassModel'
            )
        );
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
        return self::instance(
            'Controllers\Comment',
            'CommentSendControllers'
        )->commentSend(
            self::contentComment($input),
            $id,
            self::getInstance()
        );
    }

    public function commentRead($id)
    {

        if (isset($id)) {
            return self::instance(
                'Controllers\Comment',
                'CommentReadControllers'
            )->commentReadControllers(
                self::instance(
                    'Model\Comment',
                    'CommentReadModel'
                )->commentRead(
                    $id,
                    self::getInstance()
                )
            );
        }
    }

    public function commentCount()
    {
        return self::instance(
            'Controllers\Comment',
            'CommentCountControllers'
        );
    }

    public function commentDelete($input, $id, $key)
    {
        self::instance(
            'Controllers\Comment',
            'CommentDeleteControllers'
        )->commentDelete(
            $id,
            $key,
            self::getInstance()
        );
    }

    public function commentUpdate($input, $id, $key)
    {
        self::instance(
            'Controllers\Comment',
            'CommentUpdateControllers'
        )->commentUpdateControllers(
            $input,
            $id,
            $key,
            self::getInstance(),
            self::instance(
                'Model\Comment',
                'CommentUpdateModel'
            )
        );
    }


    /**
     * The code defines several functions for managing users, post, and comments in an admin panel.
     *
     * @return The adminList() function returns the result of calling the userList() function on an
     * instance of the 'AdminControllers' class with an instance of the 'AdminUserListModel' class as a
     * parameter.
     */
    public function adminList()
    {
        return self::instance(
            'Controllers\Admin',
            'AdminControllers'
        )->userList(
            self::instance(
                'Model\Admin',
                'AdminUserListModel'
            )
        );
    }

    public function adminUserUpdate($input, $id, $key)
    {
        self::instance(
            'Controllers\Admin',
            'AdminUserControllers'
        )->userUpdate(
            $id,
            self::instance(
                'Model\Admin',
                'AdminUserUpdateModel'
            )->adminUpdate($key),
            self::getInstance()
        );
    }

    public function adminUserDelete($input, $id, $key)
    {
        self::instance(
            'Controllers\Admin',
            'AdminUserDeleteControllers'
        )->adminUserDelete(
            $id,
            self::getInstance()
        );
    }

    public function adminPostList()
    {
        return self::instance(
            'Controllers\Admin',
            'AdminPostListControllers'
        )->postList(
            self::instance(
                'Model\Admin',
                'AdminPostListModel'
            )
        );
    }

    public function adminPostUpdate($input, $id, $key)
    {
        self::instance(
            'Controllers\Admin',
            'AdminPostUpdateControllers'
        )->postUpdate(
            $id,
            self::instance(
                'Model\Admin',
                'AdminPostUpdateModel'
            )->postUpdate($key),
            self::getInstance()
        );
    }

    public function adminPostDelete($input, $id, $key)
    {
        self::instance(
            'Controllers\Admin',
            'AdminPostDeleteControllers'
        )->postDelete(
            $id,
            self::instance(
                'Model\Admin',
                'AdminPostDeleteModel'
            )->postDelete($id),
            self::getInstance()
        );
    }

    public function adminCommentList()
    {

        return self::instance(
            'Controllers\Admin',
            'AdminCommentListControllers'
        )->commentList(
            self::instance(
                'Model\Admin',
                'AdminCommentListModel'
            )
        );
    }

    public function adminCommentUpdate($input, $id, $key)
    {
        self::instance(
            'Controllers\Admin',
            'AdminCommentUpdateControllers'
        )->commentUpdate(
            $id,
            self::instance(
                'Model\Admin',
                'AdminCommentUpdateModel'
            )->commentUpdate($key),
            self::getInstance()
        );
    }

    public function adminCommentDelete($input, $id, $key)
    {
        self::instance(
            'Controllers\Admin',
            'AdminCommentDeleteControllers'
        )->commentDelete(
            $id,
            self::getInstance()
        );
    }



    /**
     * The getProfil function retrieves a user's profile by calling the getUser function from the User
     * model and passing the result to the getUser function from the User controller.
     *
     * @param id The parameter "id" is the unique identifier of the user whose profile we want to
     * retrieve.
     *
     * @return the result of calling the `getUser` method on the `GetProfilControllers` instance,
     * passing the result of calling the `getUser` method on the `GetProfilModel` instance with the
     * given `` and the current instance as arguments.
     */
    public function getProfil($id)
    {
        return self::instance(
            'Controllers\User',
            'GetProfilControllers'
        )->getUser(
            self::instance(
                'Model\User',
                'GetProfilModel'
            )->getUser(
                $id,
                self::getInstance()
            )
        );
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
        self::instance(
            'Controllers\Mail',
            'SendEmail'
        )->sendEmail($id);
    }
}
