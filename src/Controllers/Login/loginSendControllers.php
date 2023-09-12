<?php

namespace Controllers\Login;



/* The loginSend class is responsible for validating user input, checking if the login exists,
validating the password, and opening a session if successful. */
class loginSendControllers
{
    protected $email = null;
    protected $password = null;
    protected $loginM;
    protected $fact;
    protected $loginSendM;

    public function loginSend(array $input, \Controllers\Fonction\factory $fact){

        $this->fact = $fact;
        $this->password = $input['password'];
        $lSendM = $fact->instance('Model\Login', 'loginSendModel');
        $this->loginM = $fact->instance('Model\Login', 'loginSendModel')->getUser($input['email'], $fact);

        try {            
            $this->validateInput($input['email']);
                if(!$this->loginM){
                    throw new \Exception("Compte inexistant");
                }
                $this->validatePassword($this->loginM['pwd'], $lSendM, $input['email']);
                header('location: /');

        } catch (\Exception $e) {
            $_SESSION['flash'] = $e->getMessage();
            header('location: /');   
        }

    }

    public function validateInput($email)
    {
        if (empty($email)) {
            throw new \Exception("Login vide");
        }

        if (empty($this->password)) {
            throw new \Exception("Mot de passe vide");
        }
    }

    protected function validatePassword($hashedPassword, $loginSM, $email)
    {
        if (!password_verify($this->password, $hashedPassword)) {
            throw new \Exception("Mot de passe invalide");
        }
        $loginSM->session = '1';
        $loginSM->getUser($email, $this->fact);

    }
    
}
