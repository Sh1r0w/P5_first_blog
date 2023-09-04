<?php

namespace Controllers\Login;



/* The loginSend class is responsible for validating user input, checking if the login exists,
validating the password, and opening a session if successful. */
class loginSend
{
    protected $email = null;
    protected $password = null;
    protected $loginM;
    protected $fact;

    public function __construct(array $input, $loginSendM)
    {
        $this->fact = \Controllers\Fonction\factory::getInstance();
        $this->email = $input['email'];
        $this->password = $input['password'];
        $this->loginM = $loginSendM;
    }

    public function loginSend(){

        try {
            $this->validateInput();
                if(!$this->loginM){
                    throw new \Exception("Compte inexistant");
                }
                $this->validatePassword($this->loginM['pwd']);
                $this->fact->openSession($this->loginM);
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
        $this->fact->validSession('1');
    }
    
}
