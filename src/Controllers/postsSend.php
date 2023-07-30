<?php

namespace Controllers;

class postsSend extends \Controllers\Fonction\action
{
    
public function postsSend(array $input)
{
    $title = $input['title'];
    $texte = $input['texte'];

    echo 'OuiOui';

    $statement = \Controllers\Fonction\db::connectDatabase()->prepare(
        "INSERT INTO ae_post(title, txt, id_user, addDate) VALUES(?,?,1, NOW())"
    );

    $sendPost = $statement->execute([$title, $texte]);

    return ($sendPost > 0);
}
}