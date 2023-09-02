<?php

namespace Controllers\Repository;

use Controllers\Interface\postsInterface;


/* The postsRepo class is a PHP class that implements the postsInterface and provides methods for
reading, listing, sending, deleting, and updating posts in a database. */

class postsRepo implements postsInterface
{

public function postsRead($id){
    $statement = \Controllers\Fonction\db::connectDatabase()->query(
        "SELECT * FROM ae_post WHERE id = $id"
    );

    return $statement;
}

public function postsList()
{
    $statement = \Controllers\Fonction\db::connectDatabase()->query(
        "SELECT * FROM ae_post a LEFT JOIN ae_user e ON a.id_user = e.id ORDER BY a.addDate DESC"
    );

    return $statement;
}

public function postsSend($title, $chapo, $content, $author, $img)
{
    $statement = \Controllers\Fonction\db::connectDatabase()->prepare(
        "INSERT INTO ae_post(title, chapo, content, author, id_user, picture, addDate, updDate ) VALUES(?,?,?,?,?,?, NOW(), NOW())"
    );
    $sendPost = $statement->execute([ $title, $chapo, $content, $author, $_SESSION['idUs'], $img]);
    return ($sendPost > 0);
}

public function postsDelete($id)
{
    $statement = \Controllers\Fonction\db::connectDatabase()->prepare(
        "DELETE FROM ae_post WHERE id = $id"
    );
    $statement->execute();
}

public function postsUpdate($id, $upTitle, $upContent, $upChapo, $upAuthor)
{
    $statement = \Controllers\Fonction\db::connectDatabase()->prepare(
        "UPDATE ae_post SET title = ?, content = ?, chapo = ?, author = ?, updDate = NOW() WHERE id = $id"
    );
    $statement->execute([$upTitle, $upContent, $upChapo, $upAuthor]);
}

}