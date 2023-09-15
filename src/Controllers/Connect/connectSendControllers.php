<?php

namespace Controllers\Connect;



/* The connectSend class is responsible for validating user input, checking if the connect exists,
validating the password, and opening a session if successful. */
class connectSendControllers
{
    protected $email = null;
    protected $password = null;
    protected $connectM;
    protected $fact;
    protected $connectSendM;

    public function connectSend(array $input, \Controllers\Fonction\factory $fact, \Model\connect\connectSendModel $lSendM){

        $lSendM->email = $input['email'];
        $this->fact = $fact;
        $this->password = $input['password'];
        $this->connectM = $lSendM->getUser($fact);
        

        try {            
            $this->validateInput($lSendM);
            
                if(!$this->connectM){
                    throw new \Exception("Compte inexistant");
                }
                $this->validatePassword($this->connectM['pwd'], $lSendM);
                header('location: /');

        } catch (\Exception $e) {
            $_SESSION['flash'] = $e->getMessage();
            header('location: /');   
        }

    }

    public function validateInput($lSendM)
    {
        if (empty($lSendM->email)) {
            throw new \Exception("Connect vide");
        }

        if (empty($this->password)) {
            throw new \Exception("Mot de passe vide");
        }
    }

    protected function validatePassword($hashedPassword, $connectSM)
    {
        if (!password_verify($this->password, $hashedPassword)) {
            throw new \Exception("Mot de passe invalide");
        }

        $connectSM->session = '1';
        $connectSM->getUser($this->fact);

    }
    
}
