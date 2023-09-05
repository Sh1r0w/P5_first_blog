<?php

namespace Controllers\Repository;

use Controllers\Interface\loginInterface;


/* The `loginRepo` class is a PHP class that implements the `loginInterface` interface and provides
methods for creating, checking, counting, and connecting users in a login system. */
class loginRepo implements loginInterface
{
    private $dbase;

    public function __construct()
    {
        $this->dbase = \Controllers\Fonction\db::connectDatabase();
    }

    public function create($login, $password)
    {
        $statement = $this->dbase->prepare(
            "INSERT INTO ae_connect(log, pwd) VALUES(?,?)"
        );
        $create = $statement->execute([$login, $password]);

        return ($create > 0);
    }

    public function check($input)
    {
        $statement = $this->dbase->prepare(
            "SELECT log FROM ae_connect WHERE log = ?"
        );
        $statement->execute([$input]);
        return $statement;
    }

    public function count()
    {
        $statement = $this->dbase->query(
            "SELECT COUNT(log) FROM ae_connect"
        );
        return $statement;
    }

    public function connect($email)
    {
        $statement = $this->dbase->prepare(
            "SELECT * FROM ae_connect a LEFT JOIN ae_user e ON a.id = e.id_login WHERE a.log = ?"
        );
        $statement->execute([$email]);
        return $statement;
    }
}