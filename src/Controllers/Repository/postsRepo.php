<?php

namespace Controllers\Repository;

use Controllers\Interface\postsInterface;


/* The postsRepo class is a PHP class that implements the postsInterface and provides methods for
reading, listing, sending, deleting, and updating posts in a database. */

class postsRepo implements postsInterface
{
    private $dbase;

    public function __construct()
    {
        $this->dbase = \Controllers\Fonction\db::connectDatabase();
    }

public function postsRead($id){
    $statement = $this->dbase->query(
        "SELECT * FROM ae_post WHERE id = $id"
    );

    return $statement;
}

public function postsList()
{
    $statement = $this->dbase->query(
        "SELECT * FROM ae_post a LEFT JOIN ae_user e ON a.id_user = e.id WHERE a.valide = 1 ORDER BY a.addDate DESC"
    );

    return $statement;
}

public function postsSend($title, $chapo, $content, $author, $img)
{
    $statement = $this->dbase->prepare(
        "INSERT INTO ae_post(title, chapo, content, author, id_user, picture, addDate, updDate ) VALUES(?,?,?,?,?,?, NOW(), NOW())"
    );
    $sendPost = $statement->execute([ $title, $chapo, $content, $author, $_SESSION['idUs'], $img]);
    return ($sendPost > 0);
}

public function postsDelete($id)
{
    $statement = $this->dbase->prepare(
        "DELETE FROM ae_post WHERE id = $id"
    );
    $statement->execute();
}

public function postsUpdate($id, $upTitle, $upContent, $upChapo, $upAuthor)
{
    $statement = $this->dbase->prepare(
        "UPDATE ae_post SET title = ?, content = ?, chapo = ?, author = ?, updDate = NOW() WHERE id = $id"
    );
    $statement->execute([$upTitle, $upContent, $upChapo, $upAuthor]);
}

}