<?php

namespace Controllers\Repository;

use Controllers\Template\CommentInterface;

class CommentRepo implements CommentInterface
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
     * The create function inserts a new comment into the database with the provided content, current
     * date, user ID, and post ID.
     *
     * @param content The content parameter is the actual text or content of the comment that you want
     * to create. It could be a string or any other data type that represents the comment content.
     * @param idpost The parameter "idpost" is the ID of the post to which the comment belongs. It is
     * used to associate the comment with the correct post in the database.
     */
    public function create(string $content, int $idpost)
    {
        $statement = $this->dbase->prepare(
            "INSERT INTO ae_comment(content, addDate, id_user, id_post) VALUES (?, NOW(),?,?)"
        );
        $statement->execute([$content, $_SESSION['idUs'], $idpost]);
    }

    /**
     * The read function retrieves comments from the database for a specific post, filtering for valid
     * comments and ordering them by date.
     *
     * @param id The parameter "id" is used to specify the id of a post. The function reads comments
     * related to the specified post id from the database.
     *
     * @return a database query statement.
     */
    public function read(int $id)
    {
        $statement = $this->dbase->query(
            "SELECT * FROM ae_comment c 
            INNER JOIN ae_user u 
            ON c.id_user = u.id 
            WHERE c.id_post = $id 
            AND c.valide = 1 
            ORDER BY addDate DESC"
        );
        return $statement;
    }

    /**
     * The above function deletes a comment from the "ae_comment" table in the database based on the
     * provided ID.
     *
     * @param id The "id" parameter is the unique identifier of the comment that you want to delete
     * from the "ae_comment" table.
     */
    public function delete(int $id)
    {
        $statement = $this->dbase->prepare(
            "DELETE FROM ae_comment WHERE id = $id"
        );
        $statement->execute();
    }

    /**
     * The function updates the content of a comment in the database based on the provided ID.
     *
     * @param id The "id" parameter is the unique identifier of the comment that you want to update. It
     * is used to specify which comment should be updated in the database.
     * @param content The "content" parameter is the new content that you want to update for the
     * comment with the specified ID.
     */
    public function update(int $id, string $content)
    {
        $statement = $this->dbase->prepare(
            "UPDATE ae_comment SET content = ? WHERE id = $id"
        );
        $statement->execute([$content]);
    }

    /**
     * The count() function retrieves the number of comments for each post that have been validated.
     *
     * @return a statement object.
     */
    public function count()
    {
        $statement = $this->dbase->query(
            "SELECT id_post, COUNT(*) FROM ae_comment WHERE valide = 1 GROUP BY id_post"
        );

        return $statement;
    }
}
