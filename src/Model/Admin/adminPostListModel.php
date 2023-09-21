<?php

namespace Model\Admin;

/* The adminpostListModel class retrieves a list of post from the adminRepo repository and stores
them in the post property. */
class adminPostListModel
{
    public $post;
    public function __construct(\Controllers\Fonction\factory $fact)
    {
        $list = $fact->instance('Controllers\Repository', 'adminRepo')->postList();
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
            $this->post[] = $post;
        }
        
    }
}