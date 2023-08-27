<?php

namespace Controllers;

class loginCreateSend extends \Controllers\loginSend
{
    protected $login = null;
    protected $password = null;
    private $password2 = null;
    private $passwordH = null;
    public $fact;

    public function __construct(array $input, \Controllers\Fonction\factory $factory){
        $this->fact = $factory;
        $login = $input['title'];
        $password = $input['password'];
        $password2 = $input['password2'];
        
        try{
        if(isset($login) && isset($password) && $password === $password2){

            $passwordH = password_hash($password, PASSWORD_DEFAULT);
            $check = $this->fact->instance('Model', 'loginCheck');
            if($check->loginCheck($login) == false){
            $l = $this->fact->instance('Model', 'loginCreate');
            $l->loginCreate($login, $passwordH);
        
            $autoL = [
                'email' => $login,
                'password' => $password
            ];
            $this->fact->loginSend('loginSend', $autoL);
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