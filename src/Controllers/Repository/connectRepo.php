<?php

namespace Controllers\Repository;

use Controllers\Template\ConnectInterface;

/* The `ConnectRepo` class is a PHP class that implements the `ConnectInterface` interface and provides
methods for creating, checking, counting, and connecting users in a connect system. */
class ConnectRepo implements ConnectInterface
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
     * The function creates a new record in the "ae_connect" table with the provided log and pwd
     * values.
     *
     * @param connect The "connect" parameter is a value that represents the log or username for the
     * connection. It is used to identify the user or entity associated with the connection.
     * @param password The password parameter is the password that you want to insert into the
     * "ae_connect" table in the database.
     *
     * @return a boolean value. If the insertion into the "ae_connect" table is successful and at least
     * one row is affected, it will return true. Otherwise, it will return false.
     */
    public function create(string $connect, string $password)
    {
        $statement = $this->dbase->prepare(
            "INSERT INTO ae_connect(log, pwd) VALUES(?,?)"
        );
        $create = $statement->execute([$connect, $password]);
    }

    /**
     * The function checks if a given input exists in the "log" column of the "ae_connect" table in a
     * database.
     *
     * @param input The input parameter is a value that will be used to search for a specific log in
     * the ae_connect table.
     *
     * @return the result of the executed SQL statement.
     */
    public function check(string $input)
    {
        $statement = $this->dbase->prepare(
            "SELECT log FROM ae_connect WHERE log = ?"
        );
        $statement->execute([$input]);
        return $statement;
    }

    /**
     * The count() function returns the number of rows in the "ae_connect" table.
     *
     * @return a statement object.
     */
    public function count()
    {
        $statement = $this->dbase->query(
            "SELECT COUNT(log) FROM ae_connect"
        );
        return $statement;
    }

    /**
     * The connect function retrieves data from the ae_connect and ae_user tables based on the provided
     * email.
     *
     * @param email The parameter `` is used to filter the results of the SQL query. It is used
     * in the `WHERE` clause of the query to match the value of the `log` column in the `ae_connect`
     * table. The query will return all rows from the `ae_connect` table where
     *
     * @return the result of the executed SQL statement.
     */
    public function connect(string $email)
    {
        $statement = $this->dbase->prepare(
            "SELECT * FROM ae_connect a 
            LEFT JOIN ae_user e 
            ON a.id = e.id_login 
            WHERE a.log = ?"
        );
        $statement->execute([$email]);
        return $statement;
    }
}
