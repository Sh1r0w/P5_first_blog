<?php

namespace Model;

/* The `class postsRead` is a PHP class that is used to read posts from a database. It has a
constructor method `postsRead` that takes an `id` parameter. Inside the constructor, it connects to
the database using the `db::connectDatabase()` method from the `Controllers\Fonction\db` class. */
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
            'author' => $row['author'],
            'imgP' =>$row['picture'],
            ];
            $this->read[] = $posts;
           }
        return $this->read;
    }
    
}