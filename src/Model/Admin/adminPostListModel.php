<?php

namespace Model\Admin;

class AdminPostListModel
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
        $list = $fact->instance('Controllers\Repository', 'AdminRepo')->postList();
        while ($row = $list->fetch()) {
            $post = [
                'id' => $row['id'],
                'title' => $row['title'],
                'chapo' => $row['chapo'],
                'content' => $row['content'],
                'author' => $row['author'],
                'addDate' => $row['addDate'],
                'imgP' => $row['picture'],
                'valide' => $row['valide'],
                'id_user' => $row['id_user'],
            ];
            $this->post[] = $post;
        }
    }
}
