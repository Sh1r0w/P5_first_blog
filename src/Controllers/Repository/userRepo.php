<?php

namespace Controllers\Repository;

use Controllers\Template\UserInterface;

/* The UserRepo class is a PHP class that implements the UserInterface and provides methods for
creating, reading, and updating user data in a database. */
class UserRepo implements UserInterface
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
     * The function userCreate() prepares an SQL statement to insert a new user into the database with
     * the specified values.
     *
     * @return The prepared statement for inserting a new user into the database is being returned.
     */
    public function userCreate(): object
    {
            $statement = $this->dbase->prepare(
                "INSERT INTO ae_user(
                    firstname, 
                    lastname,
                    pictures, 
                    citation, 
                    id_login, 
                    globalAdmin, 
                    cv,
                    social_network_facebook,
                    social_network_instagram,
                    social_network_x,
                    social_network_linkedin,
                    social_network_github,
                    social_network_gitlab
                    ) 
                VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)"
            );
        return $statement;
    }

    /**
     * The userRead function retrieves a user's information from the database based on their ID.
     *
     * @param id The parameter "id" is the unique identifier of the user that you want to retrieve from
     * the database. It is used in the SQL query to filter the results and fetch the user with the
     * matching id.
     *
     * @return the result of the SQL query, which is a single row of data from the "ae_connect" table
     * joined with the "ae_user" table. The specific row that is returned is determined by the value of
     * the "id" parameter passed to the function.
     */
    public function userRead(int $id): array
    {
        $statement = $this->dbase->prepare(
            "SELECT * FROM ae_connect a LEFT JOIN ae_user u ON a.id = u.id_login WHERE a.id = ?"
        );
        $statement->execute([$id]);
        return $statement->fetch();
    }

    /**
     * The userUpdate function updates the firstname, lastname, pictures, citation, and cv fields in
     * the ae_user table for a specific user identified by their id_login.
     *
     * @param id The parameter "id" is the unique identifier of the user that you want to update in the
     * database.
     *
     * @return The prepared statement for updating a user's information in the database is being
     * returned.
     */
    public function userUpdate(int $id): object
    {
        $statement = $this->dbase->prepare(
            "UPDATE ae_user 
            SET firstname = ?, 
            lastname = ?, 
            pictures = ?, 
            citation = ?, 
            cv = ?,
            social_network_facebook = ?,
            social_network_instagram = ?,
            social_network_x = ?,
            social_network_linkedin = ?,
            social_network_github = ?,
            social_network_gitlab = ?
            WHERE id_login = $id"
        );
        return $statement;
    }

    /**
     * The function updates the password of a user in the "ae_connect" table based on their ID.
     *
     * @param password The password parameter is the new password that you want to update for the user.
     * @param id The "id" parameter is the unique identifier of the user whose password needs to be
     * updated. It is used to identify the specific user in the database.
     */
    public function userPasswordUpdate(string $password, int $id): void
    {
        $statement = $this->dbase->prepare(
            "UPDATE ae_connect SET pwd = ? WHERE id = ?"
        );
        $statement->execute([$password, $id]);
    }
}
