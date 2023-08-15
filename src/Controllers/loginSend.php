<?php

namespace Controllers;

class loginSend
{
    protected $email = null;
    protected $password = null;

    public function __construct(array $input)
    {
        $email = $input['email'];
        $password = $input['password'];
        
        try {
            if (!empty($email)) {
                if (!empty($password)) {
                    $statement = \Controllers\Fonction\db::connectDatabase()->prepare(
                        "SELECT * FROM ae_connect a LEFT JOIN ae_user e ON a.id = e.id_login WHERE a.log = ?"
                    );
                    $statement->execute([$email]);
                    if (!empty($result = $statement->fetch())) {
                        if (password_verify($password, $result['pwd'])) {
                            new \Controllers\Fonction\session($result);
                            header('location: /');
                        } else {
                            throw new \Exception("Mot de passe Invalide");
                        }
                    }else{
                        throw new \Exception("Compte non trouvé");
                    }
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
