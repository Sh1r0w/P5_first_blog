<?php

namespace Controllers\Repository;

use Controllers\Interface\userInterface;

class userRepo implements userInterface
{
    private $dbase;

    public function __construct()
    {
        $this->dbase = \Controllers\Fonction\db::connectDatabase();
    }

    public function userCreate()
    {
        $statement = $this->dbase->prepare(
            "INSERT INTO ae_user(firstname, lastname,pictures, citation, id_login, globalAdmin) VALUES(?,?,?,?,?,?)"
        );
    }

    public function userRead($id)
    {
        $statement = $this->dbase->prepare(
            "SELECT * FROM ae_connect a LEFT JOIN ae_user e ON a.id = e.id_login WHERE a.id = ?"
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