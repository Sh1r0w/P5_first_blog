<?php

namespace Controllers\Repository;

use Controllers\Interface\userInterface;

/* The userRepo class is a PHP class that implements the userInterface and provides methods for
creating, reading, and updating user data in a database. */
class userRepo implements userInterface
{
    private $dbase;

    public function __construct()
    {
        $this->dbase = \Controllers\Fonction\db::connectDatabase()->dbConnect;
    }

    public function userCreate()
    {
            $this->dbase->prepare(
            "INSERT INTO ae_user(firstname, lastname,pictures, citation, id_login, globalAdmin) VALUES(?,?,?,?,?,?)"
        );
    }

    public function userRead($id)
    {
        $statement = $this->dbase->prepare(
            "SELECT * FROM ae_connect a LEFT JOIN ae_user u ON a.id = u.id_connect WHERE a.id = ?"
        );
        $statement->execute([$id]);
        return $statement;
    }

    public function userUpdate($id)
    {
        $statement = $this->dbase->prepare(
            "UPDATE ae_user SET firstname = ?, lastname = ?, citation = ?, pictures = ? WHERE id = $id"
        );
    }
}