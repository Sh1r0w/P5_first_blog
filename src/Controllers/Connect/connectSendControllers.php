<?php

namespace Controllers\Connect;

/* The connectSend class is responsible for validating user input, checking if the connect exists,
validating the password, and opening a session if successful. */
class ConnectSendControllers
{
    protected $email = null;
    protected $password = null;
    protected $connectM;
    protected $fact;
    protected $connectSendM;

    /**
     * The function connects and sends data using the input email and password, and redirects the user
     * to the homepage if successful or displays an error message if unsuccessful.
     *
     * @param array input An array containing the user's email and password.
     * @param \Controllers\Fonction\Factory fact The `` parameter is an instance of the
     * `\Controllers\Fonction\Factory` class. It is used to create instances of different classes
     * within the `Factory` namespace.
     * @param \Model\Connect\ConnectSendModel lSendM The parameter `` is an instance of the
     * `ConnectSendModel` class from the `Model\Connect` namespace. It is used to interact with the
     * database and retrieve user information.
     */
    public function connectSend(
        array $input,
        \Controllers\Fonction\Factory $fact,
        \Model\Connect\ConnectSendModel $lSendM
    ) {

        $lSendM->email = $input['email'];
        $this->fact = $fact;
        $this->password = $input['password'];
        $this->connectM = $lSendM->getUser($fact);


        try {
            $this->validateInput($lSendM);

            if (!$this->connectM) {
                throw new \Exception("Compte inexistant");
            }
                $this->validatePassword($this->connectM['pwd'], $lSendM);
                $fact->instance('Controllers\Fonction', 'Cookie')->cookie();
                header('location: /');
        } catch (\Exception $e) {
            $_SESSION['flash'] = $e->getMessage();
            header('location: /');
        }
    }

    /**
     * The function validates the input by checking if the email and password fields are empty, and
     * throws an exception with an appropriate message if they are.
     *
     * @param lSendM The parameter `` seems to be an object that contains some properties, one
     * of which is `email`.
     */
    public function validateInput(\Model\Connect\ConnectSendModel $lSendM)
    {
        if (empty($lSendM->email)) {
            throw new \Exception("Connect vide");
        }

        if (empty($this->password)) {
            throw new \Exception("Mot de passe vide");
        }
    }

    /**
     * The function validates a password by comparing it with a hashed password and throws an exception
     * if they don't match, and then updates the session and retrieves user information.
     *
     * @param hashedPassword The parameter `` is the hashed version of the password that
     * needs to be validated. It is typically stored in a database or some other secure storage.
     * @param connectSM The  parameter is an object that represents a connection to a session
     * management system. It is used to update the session status and retrieve user information.
     */
    protected function validatePassword($hashedPassword, $connectSM)
    {
        if (!password_verify($this->password, $hashedPassword)) {
            throw new \Exception("Mot de passe invalide");
        }

        $connectSM->session = '1';
        $connectSM->getUser($this->fact);
    }
}
