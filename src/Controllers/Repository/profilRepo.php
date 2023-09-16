<?php

namespace Controllers\Repository;

use Controllers\Interface\profilInterface;

class profilRepo implements profilInterface
{

    private $dbase;

    public function __construct()
    {
        $this->dbase = \Controllers\Fonction\db::connectDatabase()->dbConnect;
    }

    public function get($id)
    {
        $statement = $this->dbase->query(
            "SELECT u.id, u.lastname, u.firstname, u.citation, u.pictures, c.log FROM ae_user u LEFT JOIN ae_connect c ON c.id = u.id_login WHERE u.id = $id"
        );
        return $statement;
    }
}