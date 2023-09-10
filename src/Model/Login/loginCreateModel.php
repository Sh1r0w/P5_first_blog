<?php

namespace Model\Login;

/* The loginCreate class is used to create a new login and password entry in a database table. */
class loginCreateModel
{
    public function loginCreate(string $login, string $password, \Controllers\Fonction\factory $fact): bool
    {
        if(isset($login, $password))
        {
            return $fact->instance('Controllers\Repository', 'loginRepo')->create($login, $password);
        }
    }
    
}