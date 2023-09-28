<?php

namespace Model\Connect;

/* The connectCheckCount class is used to retrieve the count of log entries from the ae_connect table in
a database. */
class connectCheckCountModel
{
    public $result;

    public function __construct(\Controllers\Fonction\factory $fact)
    {
        $this->result = $fact->instance('Controllers\Repository', 'connectRepo')->count()->fetch()[0];

        return $this->result;
    }
}
