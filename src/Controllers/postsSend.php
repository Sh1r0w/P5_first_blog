<?php

namespace Controllers;

class postsSend
{

   protected $title = null;
   protected $content = null;
   protected $id = null;
    
public function postsSend($title, $content)
{
    echo 'ok';
    //$title = $input['title'];
    //$content = $input['content'];

    $statement = \Controllers\Fonction\db::connectDatabase()->prepare(
        "INSERT INTO ae_post(title, content, id_user, addDate, updDate) VALUES(?,?,?, NOW(), NOW())"
    );

    $sendPost = $statement->execute([$title, $content, $_SESSION['idUs']]);
    header('location: posts');
    return ($sendPost > 0);
}
}