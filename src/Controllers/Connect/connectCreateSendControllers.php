<?php

namespace Controllers\Connect;

class ConnectCreateSendControllers
{
   /**
    * The function connects, creates, and sends data based on input, while handling exceptions and
    * redirecting the user accordingly.
    *
    * @param array input An array containing the user's input data, such as email, password, and
    * password2.
    * @param check The "check" parameter is a boolean value that determines whether a user account
    * already exists or not. If it is set to true, it means that the account already exists and an
    * exception will be thrown. If it is set to false, it means that the account does not exist and the
    * account creation
    * @param \Controllers\Fonction\Factory fact The `` parameter is an instance of the
    * `\Controllers\Fonction\Factory` class.
    * @param \Model\Connect\ConnectCreateModel connectC The `` parameter is an instance of the
    * `ConnectCreateModel` class from the `Model\Connect` namespace. It is used to store the email and
    * password values from the input array, and to perform operations related to creating a new
    * connection.
    */
    public function connectCreateSend(
        array $input,
        $check,
        \Controllers\Fonction\Factory $fact,
        \Model\Connect\ConnectCreateModel $connectC
    ) {
        $connectC->email = $input['email'];
        $password = $input['password'];
        $password2 = $input['password2'];
        try {
            if (isset($input['email']) && isset($password) && $password === $password2) {
                $connectC->passwordH = password_hash($password, PASSWORD_DEFAULT);
                if ($check === false) {
                    $connectC->connectCreate($fact);
                    $autoL = [
                    'email' => $input['email'],
                    'password' => $input['password']
                    ];
                    $fact->connectSend($autoL);
                    header('location: /user');
                } else {
                    throw new \Exception("Compte déjà existant");
                    header('location: /');
                }
            }
        } catch (\Exception $e) {
            $_SESSION['flash'] = $e->getMessage();
            header('location: /');
        }
    }
}
