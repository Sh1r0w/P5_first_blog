<?php

namespace Controllers\Repository;

use Controllers\Interface\adminInterface;

class adminRepo implements adminInterface
{
    private $dbase;

    public function __construct()
    {
        $this->dbase = \Controllers\Fonction\db::connectDatabase();
    }

    public function userList()
    {
        $statement = $this->dbase->query(
            "SELECT * FROM ae_user ORDER BY id ASC"
        );

        return $statement;
    }

    public function userUpdate($id, $value)
    {
        $statement = $this->dbase->prepare(
            "UPDATE ae_user SET globalAdmin = $value WHERE id = $id"
        );
        $statement->execute();
    }

    public function userDelete($id)
    {
        
    }

    public function postsList()
    {
        $statement = $this->dbase->query(
            "SELECT * FROM ae_user WHERE valide = '0'"
        );

        return $statement;
    }

    public function postsUpdate($id, $value)
    {
        $statement = $this->dbase->prepare(
            "UPDATE ae_post SET valide = $value WHERE id = $id"
        );
        $statement->execute();
    }

    public function postsDelete($id)
    {
        $statement = $this->dbase->prepare(
            "DELETE FROM ae_post WHERE id = $id"
        );
        $statement->execute();
    }

    public function commentList()
    {
        $statement = $this->dbase->query(
            "SELECT * FROM ae_comment WHERE valide = '0'"
        );

        return $statement;
    }

    public function commentUpdate($id, $value)
    {
        $statement = $this->dbase->prepare(
            "UPDATE ae_comment SET valide = $value WHERE id = $id"
        );
        $statement->execute();
    }

    public function commentDelete($id)
    {
        $statement = $this->dbase->prepare(
            "DELETE FROM ae_comment WHERE id = $id"
        );
        $statement->execute();
    }
}