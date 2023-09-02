<?php

namespace Controllers;

class postsList
{ 

    public $posts;

    
   public function __construct()
{
    $fact = \Controllers\Fonction\factory::getInstance();
    $test = $fact->instance('Controllers\Repository', 'postsRepo')->postsList();
    while ($row = $test->fetch()) {
        $post = [
            'id' => $row[0],
            'title' => $row['title'],
            'content' => $row[3],
            'addDate' => $row[5],
            'updDate' => $row['updDate'],
            'lastname' => $row['lastname'],
            'firstname' => $row['firstname'],
            'author' => $row['author'],
            'chapo' => $row['chapo'],
            'img'=> $row['pictures'],
            'imgP' => $row['picture'],
            'id_user' => $row[7],
        ];

        $this->posts[] = $post;
    }

}
}