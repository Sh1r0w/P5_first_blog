<?php

namespace Controllers;

/* The `class loginCreateSend extends \Controllers\loginSend` is creating a new class called
`loginCreateSend` that extends the `loginSend` class. This means that the `loginCreateSend` class
inherits all the properties and methods from the `loginSend` class. */
class loginCreateSend extends \Controllers\loginSend
{
    protected $login = null;
    protected $password = null;
    private $password2 = null;
    private $passwordH = null;
    public $fact;

    public function __construct(array $input, $check, \Controllers\Fonction\factory $factory){
        $this->fact = $factory;
        $login = $input['title'];
        $password = $input['password'];
        $password2 = $input['password2'];
        
        try{
        if(isset($login) && isset($password) && $password === $password2){

            $passwordH = password_hash($password, PASSWORD_DEFAULT);
            if($check == false){
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