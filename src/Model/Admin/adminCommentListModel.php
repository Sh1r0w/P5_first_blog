<?php

namespace Model\Admin;

class AdminCommentListModel
{
    public $comments;

    /**
     * The function constructs an array of comments by fetching data from a repository and assigning it
     * to the comments array.
     *
     * @param \Controllers\Fonction\Factory fact The parameter `` is an instance of the `Factory`
     * class from the `Controllers\Fonction` namespace. It is used to create instances of different
     * classes.
     *
     * @return an array of comments.
     */
    public function __construct(\Controllers\Fonction\Factory $fact)
    {
        $list = $fact->instance('Controllers\Repository', 'AdminRepo')->commentList();
        while ($row = $list->fetch()) {
            $comment = [
                'id' => $row[0],
                'content' => $row['content'],
                'addDate' => $row['addDate'],
                'postTitle' => $row['title'],
                'lastname' => $row['lastname'],
                'firstname' => $row['firstname'],
                'valide' => $row['valide'],
                'id_user' => $row['id'],
            ];
            $this->comments[] = $comment;
        }
        return $this->comments;
    }
}
