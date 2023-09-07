<?php

namespace Model\Admin;

class adminCommentListModel
{
    public $comments;

    public function commentList(){
        $fact = \Controllers\Fonction\factory::getInstance();
        $list = $fact->instance('Controllers\Repository', 'adminRepo')->commentList();
        while($row = $list->fetch()){
            $comment = [
                'id' => $row['id'],
                'content' => $row['content'],
                'addDate' => $row['addDate'],
                'postTitle' => $row['title'],
                'lastname' => $row['lastname'],
                'firstname' => $row['firstname'],
                'valide' => $row['valide'],
            ];
           $this->comments[] = $comment;
        }
        return $this->comments;
    }
}