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

    public function loginSend(array $input, $loginSendM, \Controllers\Fonction\factory $fact){

        $this->fact = $fact;
        $this->email = $input['email'];
        $this->password = $input['password'];
        $this->loginM = $loginSendM;

        try {
            $this->validateInput();
                if(!$this->loginM){
                    throw new \Exception("Compte inexistant");
                }
                $this->validatePassword($this->loginM['pwd']);
                header('location: /');

        } catch (\Exception $e) {
            $_SESSION['flash'] = $e->getMessage();
            header('location: /');   
        }

    }

    public function validateInput()
    {
        if (empty($this->email)) {
            throw new \Exception("Login vide");
        }

        if (empty($this->password)) {
            throw new \Exception("Mot de passe vide");
        }
    }

    protected function validatePassword($hashedPassword)
    {
        if (!password_verify($this->password, $hashedPassword)) {
            throw new \Exception("Mot de passe invalide");
        }
        $n = new \Model\Login\loginSendModel;
        $n->session = '1';
        $n->getUser($this->email,$this->fact);

    }
    
}
