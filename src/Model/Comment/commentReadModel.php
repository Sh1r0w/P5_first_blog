<?php

namespace Model\Comment;

/* The commentReadModel class is responsible for retrieving and storing comments from a database. */
class commentReadModel
{
    Public $read;

    public function commentRead($id)
    {
        $fact = \Controllers\Fonction\factory::getInstance();
        $nComment = $fact->instance('Controllers\Repository', 'commentRepo')->read($id);
        
        while($row = $nComment->fetch())
        
           {
            $comment =[
            'id' => $row['id'],
            'id_user' => $row['id_user'],
            'content' => $row['content'],
            'addDate' => $row['addDate'],
            ];
            $this->read[] = $comment;
           }
        return $this->read;
    }
    
}