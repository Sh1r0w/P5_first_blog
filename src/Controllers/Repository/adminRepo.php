<?php

namespace Controllers\Repository;

use Controllers\Template\AdminInterface;

/* The `class AdminRepo implements AdminInterface` statement is declaring a class named `AdminRepo`
that implements the `AdminInterface` interface. This means that the `AdminRepo` class must provide
implementations for all the methods defined in the `AdminInterface` interface. */

class AdminRepo implements AdminInterface
{
    private $dbase;

    public function __construct()
    {
        $this->dbase = \Controllers\Fonction\Db::connectDatabase()->dbConnect;
    }

   /**
    * The code defines three functions in PHP for retrieving a list of users, updating a user's
    * globalAdmin status, and deleting a user.
    *
    * @return The `userList()` function is returning a statement object that contains the result of the
    * SQL query.
    */
    public function userList(): object
    {
        $statement = $this->dbase->query(
            "SELECT * FROM ae_user ORDER BY id ASC"
        );

        return $statement;
    }

    /**
     * The userUpdate function updates the globalAdmin value of a user in the ae_user table based on
     * the provided id.
     *
     * @param id The "id" parameter is the unique identifier of the user that you want to update. It is
     * used to specify which user's "globalAdmin" value should be updated.
     * @param value The "value" parameter is the new value that you want to update the "globalAdmin"
     * column with in the "ae_user" table.
     */
    public function userUpdate(int $id, string $value): void
    {
        $statement = $this->dbase->prepare(
            "UPDATE ae_user SET globalAdmin = $value WHERE id = $id"
        );
        $statement->execute();
    }

    /**
     * The userDelete function deletes a record from the ae_connect table based on the provided id.
     *
     * @param id The "id" parameter is the unique identifier of the user that you want to delete from
     * the "ae_connect" table.
     */
    public function userDelete(int $id): void
    {
        $statement = $this->dbase->prepare(
            "DELETE FROM ae_connect WHERE id = $id"
        );
        $statement->execute();
    }

    /**
     * The above code defines three functions in PHP for retrieving, updating, and deleting post from
     * a database.
     *
     * @return The `postList()` function is returning a statement object that contains the result of
     * the SQL query.
     */
    public function postList(): object
    {
        $statement = $this->dbase->query(
            "SELECT * FROM ae_post WHERE valide = '0'"
        );

        return $statement;
    }

    /**
     * The postUpdate function updates the "valide" field of the "ae_post" table with the given value
     * for the specified id.
     *
     * @param id The "id" parameter is the unique identifier of the post that you want to update. It is
     * used to specify which post should be updated in the database.
     * @param value The "value" parameter is the new value that you want to update the "valide" column
     * with in the "ae_post" table.
     */
    public function postUpdate(int $id, string $value): void
    {
        $statement = $this->dbase->prepare(
            "UPDATE ae_post SET valide = $value WHERE id = $id"
        );
        $statement->execute();
    }

    /**
     * The postDelete function deletes a post from the ae_post table in the database based on the given
     * id.
     *
     * @param id The parameter "id" is the unique identifier of the post that you want to delete from
     * the "ae_post" table in the database.
     */
    public function postDelete(int $id): void
    {
        $statement = $this->dbase->prepare(
            "DELETE FROM ae_post WHERE id = $id"
        );
        $statement->execute();
    }

    /**
     * The above code defines three functions in PHP for managing comments in a database, including
     * listing comments, updating the validation status of a comment, and deleting a comment.
     *
     * @return The `commentList()` function is returning a statement object that contains the result of
     * the SQL query.
     */
    public function commentList(): object
    {
        $statement = $this->dbase->query(
            "SELECT c.*, 
            p.title, 
            u.lastname,
            u.firstname, 
            u.id 
            FROM ae_comment c 
            INNER JOIN ae_post p 
            ON p.id = c.id_post 
            AND c.valide = 0  
            INNER JOIN ae_user u 
            ON u.id = c.id_user 
            ORDER BY c.addDate 
            DESC"
        );

        return $statement;
    }

    /**
     * The commentUpdate function updates the "valide" field of a comment with the given id to the
     * specified value.
     *
     * @param id The "id" parameter is the unique identifier of the comment that you want to update. It
     * is used to specify which comment should be updated in the database.
     * @param value The "value" parameter is the new value that you want to update the "valide" column
     * with in the "ae_comment" table.
     */
    public function commentUpdate(int $id, string $value): void
    {
        $statement = $this->dbase->prepare(
            "UPDATE ae_comment SET valide = $value WHERE id = $id"
        );
        $statement->execute();
    }

    /**
     * The commentDelete function deletes a comment from the ae_comment table based on the provided id.
     *
     * @param id The parameter "id" is the unique identifier of the comment that you want to delete
     * from the "ae_comment" table.
     */
    public function commentDelete(int $id): void
    {
        $statement = $this->dbase->prepare(
            "DELETE FROM ae_comment WHERE id = $id"
        );
        $statement->execute();
    }
}
