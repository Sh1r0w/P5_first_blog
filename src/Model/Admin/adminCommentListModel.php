<?php

namespace Model\Admin;

class adminCommentListModel
{
    public $comments;

    public function __construct(\Controllers\Fonction\factory $fact)
    {
        $list = $fact->instance('Controllers\Repository', 'adminRepo')->commentList();
        while($row = $list->fetch()){
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