<?php

namespace Model\Login;

/* The loginCheckCount class is used to retrieve the count of log entries from the ae_connect table in
a database. */
class loginCheckCountModel
{
    public $result;

    public function __construct(\Controllers\Fonction\factory $fact)
    {
        $this->result = $fact->instance('Controllers\Repository', 'loginRepo')->count()->fetch()[0];
        
        return $this->result;
    }
}