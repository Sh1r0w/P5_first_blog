<?php

namespace Model;

class loginSend

{
    public Function loginSend(string $email, string $password)
    
    {
        $statement = \Controllers\Fonction\db::connectDatabase()->prepare(
            "SELECT * FROM ae_connect a LEFT JOIN ae_user e ON a.id = e.id_login WHERE a.log = ?"
        );
        $statement->execute([$email]);
        if (!empty($result = $statement->fetch())) {
            if (password_verify($password, $result['pwd'])) {
                \Controllers\Fonction\session::getSession($result);
                header('location: /');
            } else {
                throw new \Exception("Mot de passe Invalide");
            }
        }else{
            throw new \Exception("Compte non trouvé");
        }

    }
}