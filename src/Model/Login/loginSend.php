<?php

namespace Model\Login;

/* The loginSend class in PHP retrieves user information from a database based on the provided email. */
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