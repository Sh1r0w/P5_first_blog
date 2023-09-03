<?php

namespace Model\Posts;

/* The `class postsRead` is a PHP class that is used to read posts from a database. It has a
constructor method `postsRead` that takes an `id` parameter. Inside the constructor, it connects to
the database using the `db::connectDatabase()` method from the `Controllers\Fonction\db` class. */
class postsReadModel
{
    Public $read;

    public function postsReadModel($id)
    {
        $fact = \Controllers\Fonction\factory::getInstance();
        $read = $fact->instance('Controllers\Repository', 'postsRepo')->postsRead($id);
        
        while($row = $read->fetch())
           {
            $posts =[
            'id' => $row['id'],
            'title' => $row['title'],
            'content' => $row['content'],
            'author' => $row['author'],
            'addDate' => $row['addDate'],
            'updDate' => $row['updDate'],
            'author' => $row['author'],
            'imgP' =>$row['picture'],
            ];
            $this->read[] = $posts;
           }
        return $this->read;
    }
    
}