<?php

namespace Controllers\Login;

/* The `class loginCreateSend extends \Controllers\loginSend` is creating a new class called
`loginCreateSend` that extends the `loginSend` class. This means that the `loginCreateSend` class
inherits all the properties and methods from the `loginSend` class. */
class loginCreateSendControllers
{
    protected $login = null;
    protected $password = null;
    private $password2 = null;
    private $passwordH = null;


    public function loginCreateSend(array $input, $check){
        $fact = \Controllers\Fonction\factory::getInstance();
        $login = $input['email'];
        $password = $input['password'];
        $password2 = $input['password2'];
        try{
        if(isset($login) && isset($password) && $password === $password2){
            $passwordH = password_hash($password, PASSWORD_DEFAULT);
            if($check == false){
            $fact->instance('Model\Login', 'loginCreateModel')->loginCreate($login, $passwordH);

            $autoL = [
                'email' => $login,
                'password' => $password
            ];
            $fact->loginSend('loginSend', $autoL);
            header('location: /user');
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