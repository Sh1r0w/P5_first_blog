<?php

namespace Model\Admin;

/* The adminPostsListModel class retrieves a list of posts from the adminRepo repository and stores
them in the posts property. */
class adminPostsListModel
{
    public $posts;

    public function __construct()
    {
        $fact = \Controllers\Fonction\factory::getInstance();
        $list = $fact->instance('Controllers\Repository', 'adminRepo')->postsList();
        while($row = $list->fetch()){
            $post = [
                'id' => $row['id'],
                'title' => $row['title'],
                'chapo' => $row['chapo'],
                'content' => $row['content'],
                'author' => $row['author'],
                'addDate' => $row['addDate'],
                'picture' => $row['picture'],
                'valide' => $row['valide'],
            ];
            $this->posts[] = $post;
        }
        
    }
}