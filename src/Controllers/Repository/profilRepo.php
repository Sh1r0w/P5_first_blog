<?php

namespace Controllers\Repository;

use Controllers\Template\ProfilInterface;

/**
 * The `ProfilRepo` class is a PHP class that implements the `ProfilInterface` interface and provides a
 * method to retrieve user profile information from a database.
 */

class ProfilRepo implements ProfilInterface
{
    private $dbase;

    /**
     * The function constructs an object and assigns a database connection to a property.
     */
    public function __construct()
    {
        $this->dbase = \Controllers\Fonction\Db::connectDatabase()->dbConnect;
    }

    /**
     * The function retrieves user information and connection logs from the database based on the
     * provided user ID.
     *
     * @param id The "id" parameter is used to specify the user ID for which you want to retrieve the
     * data.
     *
     * @return a database query statement.
     */
    public function get(int $id): object
    {
        $statement = $this->dbase->query(
            "SELECT u.id, u.lastname, u.firstname, u.citation, u.pictures, u.cv, c.log 
            FROM ae_user u 
            LEFT JOIN ae_connect c 
            ON c.id = u.id_login 
            WHERE u.id = $id"
        );
        return $statement;
    }
}
