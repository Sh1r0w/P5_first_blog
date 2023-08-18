<?php

namespace Controllers;

class loginSend
{
    protected $email = null;
    protected $password = null;

    public function loginSend(array $input)
    {
        $email = $input['email'];
        $password = $input['password'];
        
        try {
            if (!empty($email)) {
                if (!empty($password)) {
                    $n = new \Model\loginSend;
                    $n->loginSend($email, $password);
                } else {
                    throw new \Exception("Mot de passe vide");
                }
            } else {
                throw new \Exception("login vide");
            }
        } catch (\Exception $e) {
            $_SESSION['flash'] = $e->getMessage();
            header('location: /');   
        }
    }
}
