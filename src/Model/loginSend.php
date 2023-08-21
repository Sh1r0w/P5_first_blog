<?php

namespace Model;

class loginSend

{
    public Function getUser(string $email)
    
    {
        $statement = \Controllers\Fonction\db::connectDatabase()->prepare(
            "SELECT * FROM ae_connect a LEFT JOIN ae_user e ON a.id = e.id_login WHERE a.log = ?"
        );
        $statement->execute([$email]);
        return $statement->fetch();
        

    }
}