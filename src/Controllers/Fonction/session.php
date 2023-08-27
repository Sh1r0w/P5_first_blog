<?php

namespace Controllers\Fonction;

/* The `class session` is a PHP class that is used to manage session data. It has a constructor method
that takes an array of input data and sets various session variables using the ``
superglobal. These variables include information about the logged-in user, such as their ID, first
name, last name, profile image, citation, and admin status. The class also has a static method
`getSession` that creates a new instance of the `session` class if one does not already exist. */
class session
{
    public $session = [];
    private static $_getSession;

    public static function getSession($input){
        if(is_null(self::$_getSession)){
            self::$_getSession = new session($input);
        }
    }

    public function __construct(array $input)
    {

        $_SESSION['logged_user'] = $input[1];
        $_SESSION['idCo'] = $input[0];
        $_SESSION['idUs'] = $input['id'];
        $_SESSION['firstname'] = $input['firstname'];
        $_SESSION['lastname'] = $input['lastname'];
        $_SESSION['img'] = $input[6];
        $_SESSION['citation'] = $input['citation'];
        $_SESSION['admin'] = $input['globalAdmin'];
        $_SESSION['flash'] = null;
    }
}
