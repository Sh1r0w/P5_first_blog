<?php

namespace Controllers\Repository;

use Controllers\Interface\postInterface;


/* The postRepo class is a PHP class that implements the postInterface and provides methods for
reading, listing, sending, deleting, and updating post in a database. */

class postRepo implements postInterface
{
    private $dbase;

    public function __construct()
    {
        $this->dbase = \Controllers\Fonction\db::connectDatabase()->dbConnect;
    }

public function postRead($id){
    
    $statement = $this->dbase->query(
        "SELECT * FROM ae_post WHERE id = $id"
    );

    return $statement;
}

public function postList()
{
    $statement = $this->dbase->query(
        "SELECT * FROM ae_post a LEFT JOIN ae_user e ON a.id_user = e.id WHERE a.valide = 1 ORDER BY a.addDate DESC"
    );

    return $statement;
}

public function postSend($title, $chapo, $content, $author, $img)
{
    $statement = $this->dbase->prepare(
        "INSERT INTO ae_post(title, chapo, content, author, id_user, picture, addDate, updDate ) VALUES(?,?,?,?,?,?, NOW(), NOW())"
    );
    $sendPost = $statement->execute([ $title, $chapo, $content, $author, $_SESSION['idUs'], $img]);
    return ($sendPost > 0);
}

public function postDelete($id)
{
    $statement = $this->dbase->prepare(
        "DELETE FROM ae_post WHERE id = $id"
    );
    $statement->execute();
}

public function postUpdate($id, $upTitle, $upContent, $upChapo, $upAuthor)
{
    $statement = $this->dbase->prepare(
        "UPDATE ae_post SET title = ?, content = ?, chapo = ?, author = ?, updDate = NOW() WHERE id = $id"
    );
    $statement->execute([$upTitle, $upContent, $upChapo, $upAuthor]);
}

}