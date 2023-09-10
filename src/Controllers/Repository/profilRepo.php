<?php

namespace Controllers\Repository;

use Controllers\Interface\profilInterface;

class profilRepo implements profilInterface
{

    private $dbase;

    public function __construct()
    {
        $this->dbase = \Controllers\Fonction\db::connectDatabase();
    }

    public function get($id)
    {
        $statement = $this->dbase->query(
            "SELECT lastname, firstname, citation, pictures FROM ae_user WHERE id = $id"
        );
        return $statement;
    }
}