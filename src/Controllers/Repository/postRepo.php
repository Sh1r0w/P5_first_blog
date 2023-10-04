<?php

namespace Controllers\Repository;

use Controllers\Template\PostInterface;

/* The PostRepo class is a PHP class that implements the PostInterface and provides methods for
reading, listing, sending, deleting, and updating post in a database. */

class PostRepo implements PostInterface
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
     * The function "postRead" retrieves a post from the database based on the given ID.
     *
     * @param id The parameter "id" is used to specify the ID of the post that you want to retrieve
     * from the database.
     *
     * @return the result of the SQL query executed in the `` variable.
     */
    public function postRead(int $id): object
    {

        $statement = $this->dbase->query(
            "SELECT * FROM ae_post WHERE id = $id"
        );

        return $statement;
    }

   /**
    * The postList function retrieves a list of posts from the database, including information about
    * the user who created each post, and orders them by their addDate in descending order.
    *
    * @return a database query statement.
    */
    public function postList(): object
    {
        $statement = $this->dbase->query(
            "SELECT * FROM ae_post a 
            LEFT JOIN ae_user e 
            ON a.id_user = e.id
            WHERE a.valide = 1 
            ORDER BY a.addDate DESC"
        );

        return $statement;
    }

   /**
    * The function `postSend` inserts a new post into the database with the provided title, chapo,
    * content, author, image, and the current date and time.
    *
    * @param title The title of the post.
    * @param chapo The parameter "chapo" is likely a short summary or introduction of the post. It is
    * commonly used in news articles or blog posts to provide a brief overview of the main content.
    * @param content The "content" parameter is the main body of the post, which typically contains the
    * detailed information or message that you want to convey in your post.
    * @param author The "author" parameter is the name or identifier of the person who is creating or
    * writing the post.
    * @param img The "img" parameter is the picture associated with the post. It is used to store the
    * image file path or URL in the database.
    *
    * @return a boolean value. If the execution of the SQL statement is successful and at least one row
    * is affected, it will return true. Otherwise, it will return false.
    */
    public function postSend(string $title, string $chapo, string $content, string $author, ?string $img): void
    {
        $statement = $this->dbase->prepare(
            "INSERT INTO ae_post(title, chapo, content, author, id_user, picture, addDate, updDate ) 
            VALUES(?,?,?,?,?,?, NOW(), NOW())"
        );
        $statement->execute([ $title, $chapo, $content, $author, $_SESSION['idUs'], $img]);
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
     * The function updates a post in the database with the provided title, content, chapo, author,
     * picture, and current date.
     *
     * @param id The id parameter is the unique identifier of the post that you want to update. It is
     * used to specify which post should be updated in the database.
     * @param upTitle The updated title of the post.
     * @param upContent The parameter "upContent" is used to update the content of a post. It
     * represents the new content that you want to set for the post with the given ID.
     * @param upChapo The parameter "upChapo" is used to update the "chapo" field in the "ae_post"
     * table. It represents the updated summary or introduction of the post.
     * @param upAuthor The parameter "upAuthor" is the updated author name for the post.
     * @param upImg The parameter "upImg" is used to update the picture field in the ae_post table. It
     * represents the new image that you want to associate with the post.
     */
    public function postUpdate(int $id, string $upTitle, string $upContent, string $upChapo, string $upAuthor, ?string $upImg): void
    {
        $statement = $this->dbase->prepare(
            "UPDATE ae_post SET title = ?, 
            content = ?, 
            chapo = ?, 
            author = ?, 
            picture = ?, 
            updDate = NOW() 
            WHERE id = $id"
        );
        $statement->execute([$upTitle, $upContent, $upChapo, $upAuthor, $upImg]);
    }
}
