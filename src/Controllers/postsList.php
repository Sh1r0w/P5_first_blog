<?php

namespace Controllers;

class postsList
{ 
    public $posts;

   public function __construct()
{
    $statement = \Controllers\Fonction\db::connectDatabase()->query(
        "SELECT * FROM ae_post a LEFT JOIN ae_user e ON a.id_user = e.id ORDER BY a.addDate DESC"
    );
    while (($row = $statement->fetch())) {
        $post = [
            'id' => $row[0],
            'title' => $row['title'],
            'content' => $row['content'],
            'addDate' => $row['addDate'],
            'updDate' => $row['updDate'],
            'lastname' => $row['lastname'],
            'firstname' => $row['firstname'],
            'admin' => $row['globalAdmin'],
            'img'=> $row['pictures'],
            'id_user' => $row['id_user'],
        ];

        $this->posts[] = $post;
    }

}
}