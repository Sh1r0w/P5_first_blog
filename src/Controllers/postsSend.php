<?php

namespace Controllers;

class postsSend
{

   protected $title = null;
   protected $texte = null;
    
public function __construct(array $input)
{
    $title = $input['title'];
    $texte = $input['texte'];

    $statement = \Controllers\Fonction\db::connectDatabase()->prepare(
        "INSERT INTO ae_post(title, txt, id_user, addDate) VALUES(?,?,1, NOW())"
    );

    $sendPost = $statement->execute([$title, $texte]);
    header('location: posts');
    return ($sendPost > 0);
}
}