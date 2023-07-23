<?php


// model for save one post

function createPost(string $title, string $texte)
{
    require '../controllers/db.php';

    $statement = dbConnect()->prepare(
        'INSERT INTO ae_post(title, texte, id_user, datePost) VALUES(?,?,?, NOW())'
    );

    $sendPost = $statement->execute([$title, $texte]);

    return ($sendPost > 0);

}
