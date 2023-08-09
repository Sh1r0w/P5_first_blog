<?php

namespace Controllers;

class postsSend
{

   protected $title = null;
   protected $texte = null;
   protected $id = null;
    
public function __construct(array $input)
{
    $title = $input['title'];
    $texte = $input['texte'];

    $statement = \Controllers\Fonction\db::connectDatabase()->prepare(
        "INSERT INTO ae_post(title, txt, id_user, addDate) VALUES(?,?,?, NOW())"
    );

    $sendPost = $statement->execute([$title, $texte, $_SESSION['idUs']]);
    header('location: posts');
    return ($sendPost > 0);
}
}