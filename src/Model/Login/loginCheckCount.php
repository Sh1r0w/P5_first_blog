<?php

namespace Model\Login;

/* The loginCheckCount class is used to retrieve the count of log entries from the ae_connect table in
a database. */
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