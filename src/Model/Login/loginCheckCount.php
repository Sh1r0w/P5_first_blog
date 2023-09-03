<?php

namespace Model\Login;

class loginCheckCount
{
    public function loginCheckCount()
    {
        $statement = \Controllers\Fonction\db::connectDatabase()->query(
            "SELECT COUNT(log) FROM ae_connect"
        );
        
        return $statement->fetch();
    }
}