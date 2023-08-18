<?php

namespace Model;

class userPush

{
    public function userPush($firstname, $lastname, $citation, $id, $img)
    {
        $statement = \Controllers\Fonction\db::connectDatabase()->prepare(
            "INSERT INTO ae_user(firstname, lastname,pictures, citation, id_login) VALUES(?,?,?,?,?)"
        );
        $img = new \Controllers\Fonction\img;
        $statement->execute([$firstname, $lastname, $img->name = $_SESSION['img'], $citation, $id]);
    }
}