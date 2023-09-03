<?php

namespace Model\Login;

class loginCreate
{
    public function loginCreate(string $login, string $password): bool
    {
        if(isset($login, $password))
        {
            $statement = \Controllers\Fonction\db::connectDatabase()->prepare(
                "INSERT INTO ae_connect(log, pwd) VALUES(?,?)"
            );
            $create = $statement->execute([$login, $password]);

            return ($create > 0);
        }
    }
    
}