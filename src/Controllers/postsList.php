<?php

namespace Controllers;

class postsList
{ 
    public $posts;

   public function __construct()
{
    $statement = \Controllers\Fonction\db::connectDatabase()->query(
        "SELECT id, title, txt, addDate AS addDate FROM ae_post ORDER BY addDate DESC"
    );
    while (($row = $statement->fetch())) {
        $post = [
            'id' => $row['id'],
            'title' => $row['title'],
            'txt' => $row['txt'],
            'addDate' => $row['addDate'],
        ];

        $this->posts[] = $post;
        
    }

}
}