<?php

namespace Controllers;

class postsList
{ 
    public $posts;

   public function __construct()
{
    $statement = \Controllers\Fonction\db::connectDatabase()->query(
        //"SELECT id, title, txt, addDate AS addDate FROM ae_post ORDER BY addDate DESC"
        "SELECT * FROM ae_post a LEFT JOIN ae_user e ON a.id_user = e.id ORDER BY a.addDate DESC"
    );
    while (($row = $statement->fetch())) {
        $post = [
            'id' => $row[0],
            'title' => $row['title'],
            'txt' => $row['txt'],
            'addDate' => $row['addDate'],
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