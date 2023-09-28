<?php

namespace Model\Post;


/* The `postReadModel` class is responsible for retrieving and storing information about post from a
database. */
class postReadModel
{
    Public $read;

    public function postReadModel($id, \Controllers\Fonction\factory $fact)
    {
        //$fact = \Controllers\Fonction\factory::getInstance();
        $read = $fact->instance('Controllers\Repository', 'postRepo')->postRead($id);
        while($row = $read->fetch())
           {
            $post =[
            'id' => $row['id'],
            'title' => $row['title'],
            'chapo' => $row['chapo'],
            'content' => $row['content'],
            'author' => $row['author'],
            'addDate' => $row['addDate'],
            'updDate' => $row['updDate'],
            'author' => $row['author'],
            'imgP' => $row['picture'],
            'idUs' => $row['id_user'],
            ];
            $this->read[] = $post;
           }
        return $this->read;
    }
    
}