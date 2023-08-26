<?php

namespace Model;

class postsRead
{
    Public $read;

    public function postsRead($id)
    {
        $statement = \Controllers\Fonction\db::connectDatabase()->query(
            "SELECT * FROM ae_post WHERE id = $id"
        );
        
        while($row = $statement->fetch())
           {
            $posts =[
            'id' => $row['id'],
            'title' => $row['title'],
            'content' => $row['content'],
            'author' => $row['author'],
            'addDate' => $row['addDate'],
            'updDate' => $row['updDate'],
            ];
            $this->read[] = $posts;
           }
        return $this->read;
    }
    
}