<?php

namespace Controllers\Login;

/* The `class loginCreateSend extends \Controllers\loginSend` is creating a new class called
`loginCreateSend` that extends the `loginSend` class. This means that the `loginCreateSend` class
inherits all the properties and methods from the `loginSend` class. */
class loginCreateSendControllers
{

    public function loginCreateSend(array $input, $check, \Controllers\Fonction\factory $fact, \Model\Login\loginCreateModel $loginC){
        $loginC->email = $input['email'];
        $password = $input['password'];
        $password2 = $input['password2'];
        try{
        if(isset($input['email']) && isset($password) && $password === $password2){
            $loginC->passwordH = password_hash($password, PASSWORD_DEFAULT);
            if($check == false){
            $loginC->loginCreate($fact);
            $autoL = [
                'email' => $input['email'],
                'password' => $input['password']
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