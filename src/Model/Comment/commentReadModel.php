<?php

namespace Model\Comment;

class CommentReadModel
{
    public $read;

    /**
     * The commentRead function retrieves comments from a database and returns them as an array.
     *
     * @param id The parameter "id" is the identifier of the comment that you want to read. It is used
     * to fetch the specific comment from the database.
     * @param \Controllers\Fonction\Factory fact The parameter `` is an instance of the `Factory`
     * class from the `Controllers\Fonction` namespace. It is used to create instances of different
     * classes within the factory pattern. In this case, it is used to create an instance of the
     * `CommentRepo` class from the `Controllers
     *
     * @return an array of comments.
     */
    public function commentRead(int $id, \Controllers\Fonction\Factory $fact)
    {
        $nComment = $fact->instance(
            'Controllers\Repository',
            'CommentRepo'
        )->read($id);

        while ($row = $nComment->fetch()) {
            $comment = [
            'id' => $row['0'],
            'id_user' => $row['id_user'],
            'content' => $row['content'],
            'addDate' => $row['addDate'],
            'lastname' => $row['lastname'],
            'firstname' => $row['firstname'],
            'img' => $row['pictures'],
            'citation' => $row['citation'],
            'id_post' => $row['id_post'],
            ];
            $this->read[] = $comment;
        }
        return $this->read;
    }
}
