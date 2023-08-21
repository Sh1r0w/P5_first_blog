<?php

namespace Controllers;

class loginCreateSend extends \Controllers\loginSend
{
    protected $login = null;
    protected $password = null;
    private $password2 = null;
    private $passwordH = null;

    public function __construct(array $input){
        $this->fact = \Controllers\Fonction\factory::getInstance();
        $login = $input['title'];
        $password = $input['password'];
        $password2 = $input['password2'];
        
        try{
        if(isset($login) && isset($password) && $password === $password2){

            $passwordH = password_hash($password, PASSWORD_DEFAULT);
            $check = $this->fact->instance('Model', 'loginCheck');
            if($check->loginCheck($login) == false){
            $l = new \Model\loginCreate;
            $l->loginCreate($login, $passwordH);
        
            $autoL = [
                'email' => $login,
                'password' => $password
            ];
            $this->fact->userLog('Send', $autoL);
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