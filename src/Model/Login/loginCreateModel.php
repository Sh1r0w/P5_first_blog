<?php

namespace Model\Login;

/* The loginCreate class is used to create a new login and password entry in a database table. */
class loginCreateModel
{
    public function loginCreate(string $login, string $password): bool
    {
        if(isset($login, $password))
        {
            $fact = \Controllers\Fonction\factory::getInstance();
            return $fact->instance('Controllers\Repository', 'loginRepo')->create($login, $password);
        }
    }
    
}