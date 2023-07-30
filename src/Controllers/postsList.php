<?php

namespace Controllers;

class postsList
{ 
    public $posts;

   public function __construct()
{
    echo 'ok1';
    $statement = \Controllers\Fonction\db::connectDatabase()->query(
        "SELECT id, title, txt, DATE_FORMAT(addDate, '%d/%m/%Y %H:%i:%S') AS addDate FROM ae_post ORDER BY addDate DESC"
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