<?php

namespace Model\Login;

/* The loginCheckCount class is used to retrieve the count of log entries from the ae_connect table in
a database. */
class loginCheckCountModel
{
    public function loginCheckCount()
    {
        $fact = \Controllers\Fonction\factory::getInstance();
        
        return $fact->instance('Controllers\Repository', 'loginRepo')->count()->fetch();
    }
}