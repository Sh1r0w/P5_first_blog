<?php

namespace Controllers\Repository;

use Controllers\Interface\connectInterface;


/* The `connectRepo` class is a PHP class that implements the `connectInterface` interface and provides
methods for creating, checking, counting, and connecting users in a connect system. */
class connectRepo implements connectInterface
{
    private $dbase;

    public function __construct()
    {
        $this->dbase = \Controllers\Fonction\db::connectDatabase()->dbConnect;
    }

    public function create($connect, $password)
    {
        $statement = $this->dbase->prepare(
            "INSERT INTO ae_connect(log, pwd) VALUES(?,?)"
        );
        $create = $statement->execute([$connect, $password]);

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