<?php

namespace Controllers\Repository;

use Controllers\Interface\adminInterface;

/* The `class adminRepo implements adminInterface` statement is declaring a class named `adminRepo`
that implements the `adminInterface` interface. This means that the `adminRepo` class must provide
implementations for all the methods defined in the `adminInterface` interface. */

class adminRepo implements adminInterface
{
    private $dbase;

    public function __construct()
    {
        $this->dbase = \Controllers\Fonction\db::connectDatabase();
    }

   /**
    * The code defines three functions in PHP for retrieving a list of users, updating a user's
    * globalAdmin status, and deleting a user.
    * 
    * @return The `userList()` function is returning a statement object that contains the result of the
    * SQL query.
    */
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

    /**
     * The above code defines three functions in PHP for retrieving, updating, and deleting posts from
     * a database.
     * 
     * @return The `postsList()` function is returning a statement object that contains the result of
     * the SQL query.
     */
    public function postsList()
    {
        $statement = $this->dbase->query(
            "SELECT * FROM ae_post WHERE valide = '0'"
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

    /**
     * The above code defines three functions in PHP for managing comments in a database, including
     * listing comments, updating the validation status of a comment, and deleting a comment.
     * 
     * @return The `commentList()` function is returning a statement object that contains the result of
     * the SQL query.
     */
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