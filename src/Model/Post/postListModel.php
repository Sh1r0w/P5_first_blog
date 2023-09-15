<?php

namespace Model\Post;

/* The `postListModel` class retrieves a list of post from a repository and stores them in an array. */
class postListModel
{
    public $post;

    public function __construct(\Controllers\Fonction\factory $fact)
    {

        $list = $fact->instance('Controllers\Repository', 'postRepo')->postList();
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
                'img'=> $row['pictures'],
                'imgP' => $row['picture'],
                'id_user' => $row[7],
            ];
    
            $this->post[] = $post;
        }
    }
}