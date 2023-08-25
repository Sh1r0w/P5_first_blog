<?php

namespace Controllers;

class postsSend
{

   protected $title = null;
   protected $content = null;
   protected $chapo = null;
   protected $author = null;
   protected $id = null;
    
public function postsSend($title, $chapo ,$content, $author)
{

    $statement = \Controllers\Fonction\db::connectDatabase()->prepare(
        "INSERT INTO ae_post(title, chapo, content, author, id_user, addDate, updDate) VALUES(?,?,?,?,?, NOW(), NOW())"
    );

    $sendPost = $statement->execute([$title, $chapo, $content, $author, $_SESSION['idUs']]);
    header('location: posts');
    return ($sendPost > 0);
}
}