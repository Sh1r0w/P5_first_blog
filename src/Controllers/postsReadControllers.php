<?php

namespace Controllers;

class postsReadControllers
{
    public $read;

    public function postsReadControllers($id)
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