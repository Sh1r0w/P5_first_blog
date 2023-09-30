<?php

namespace Model\Post;

class PostListModel
{
    public $post;

    /**
     * The function constructs an array of posts by fetching data from a repository.
     *
     * @param \Controllers\Fonction\Factory fact The parameter `` is an instance of the `Factory`
     * class from the `Controllers\Fonction` namespace. It is used to create instances of different
     * classes.
     */
    public function __construct(\Controllers\Fonction\Factory $fact)
    {

        $list = $fact->instance(
            'Controllers\Repository',
            'PostRepo'
        )->postList();
        while ($row = $list->fetch()) {
            $post = [
                'id' => $row[0],
                'title' => $row['title'],
                'content' => $row[3],
                'addDate' => $row[5],
                'updDate' => $row['updDate'],
                'lastname' => $row['lastname'],
                'firstname' => $row['firstname'],
                'author' => $row['author'],
                'chapo' => $row['chapo'],
                'img' => $row['pictures'],
                'imgP' => $row['picture'],
                'id_user' => $row[7],
            ];

            $this->post[] = $post;
        }
    }
}
