<?php

namespace Controllers;

class loginCreateSend
{
    private $login = null;
    private $password = null;
    private $password2 = null;
    private $passwordH = null;

    public function __construct(array $input){
        $login = $input['title'];
        $password = $input['password'];
        $password2 = $input['password2'];
        
        if(isset($login) && isset($password) && $password === $password2){
            $passwordH = password_hash($password, PASSWORD_DEFAULT);
            $statement = \Controllers\Fonction\db::connectDatabase()->prepare(
                "INSERT INTO ae_connect(log, pwd) VALUES(?,?)"
            );
            $create = $statement->execute([$login, $passwordH]);
            header('location: posts');
            return ($create > 0);
        } else {
            echo 'ne marche pas';
        }
    }
}