<?php

namespace Model\Login;

/* The loginSend class in PHP retrieves user information from a database based on the provided email. */
class loginSendModel

{
    public Function getUser($email)
    
    {
        $fact = \Controllers\Fonction\factory::getInstance();
        return $fact->instance('Controllers\Repository', 'loginRepo')->connect($email)->fetch();

    }
}