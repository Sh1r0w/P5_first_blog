<?php

namespace Model\Comment;

/* The commentReadModel class is responsible for retrieving and storing comments from a database. */
class commentReadModel
{
    public $read;

    public function commentRead($id, \Controllers\Fonction\factory $fact)
    {
        $nComment = $fact->instance('Controllers\Repository', 'commentRepo')->read($id);

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
