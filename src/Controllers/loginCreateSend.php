<?php

namespace Controllers;

class loginCreateSend extends \Controllers\loginSend
{
    protected $login = null;
    protected $password = null;
    private $password2 = null;
    private $passwordH = null;

    public function loginCreateSend(array $input){
        $login = $input['title'];
        $password = $input['password'];
        $password2 = $input['password2'];
        try{
        if(isset($login) && isset($password) && $password === $password2){
            $passwordH = password_hash($password, PASSWORD_DEFAULT);
            $check = new \Model\loginCheck;
            if($check->loginCheck($login) == false){
            $l = new \Model\loginCreate;
            $l->loginCreate($login, $passwordH);
        
            $autoL = [
                'email' => $login,
                'password' => $password
            ];
            parent::loginSend($autoL);
            header('location: posts');
        } else {
            throw new \Exception("Compte déjà existant");
            header('location: /');
        }
        } 
    } catch (\Exception $e){
        $_SESSION['flash'] = $e->getMessage();
        header('location: /');
    }
    }
}