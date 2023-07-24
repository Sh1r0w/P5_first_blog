<?php

// model for save one post

function getPost($database){


    $statement = $database->query( 
        "SELECT id, title, txt, DATE_FORMAT(addDate, '%d/%m/%Y %H:%i:%S') AS addDate FROM ae_post ORDER BY addDate DESC"
    );
    
    while (($row = $statement->fetch())) {
        $post = [
            'id' => $row['id'],
            'title' => $row['title'],
            'txt' => $row['txt'],
            'addDate' => $row['addDate'],
        ];

        $posts[] = $post;
    }

    if (isset($posts)) {
        return $posts;
    }

    
}

function createPost(string $title, string $texte, $database)
{

    $statement = $database->prepare(
        "INSERT INTO ae_post(title, txt, id_user, addDate) VALUES(?,?,1, NOW())"
    );

    $sendPost = $statement->execute([$title, $texte]);

    return ($sendPost > 0);

}
