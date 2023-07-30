<?php

class sendPost extends ListPost
{
public function createPost(string $title, string $texte)
{

    $statement = DbConnect::connectDatabase()->prepare(
        "INSERT INTO ae_post(title, txt, id_user, addDate) VALUES(?,?,1, NOW())"
    );

    $sendPost = $statement->execute([$title, $texte]);

    return ($sendPost > 0);
}
}