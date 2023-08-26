<?php

namespace Model;

class commentRead
{
    Public $read;

    public function commentRead($id)
    {

        $statement = \Controllers\Fonction\db::connectDatabase()->query(
            "SELECT * FROM ae_comment WHERE id_post = $id ORDER BY addDate DESC"
        );
        
        while($row = $statement->fetch())
        
           {
            $comment =[
            'content' => $row['content'],
            'addDate' => $row['addDate'],
            ];
            $this->read[] = $comment;
           }
        return $this->read;
    }
    
}