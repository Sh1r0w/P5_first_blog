<?php

namespace Controllers\Connect;

/* The `class connectCreateSend extends \Controllers\connectSend` is creating a new class called
`connectCreateSend` that extends the `connectSend` class. This means that the `connectCreateSend` class
inherits all the properties and methods from the `connectSend` class. */
class connectCreateSendControllers
{

    public function connectCreateSend(array $input, $check, \Controllers\Fonction\factory $fact, \Model\Connect\connectCreateModel $connectC){
        $connectC->email = $input['email'];
        $password = $input['password'];
        $password2 = $input['password2'];
        try{
        if(isset($input['email']) && isset($password) && $password === $password2){
            $connectC->passwordH = password_hash($password, PASSWORD_DEFAULT);
            if($check == false){
            $connectC->connectCreate($fact);
            $autoL = [
                'email' => $input['email'],
                'password' => $input['password']
            ];
            $fact->connectSend('connectSend', $autoL);
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