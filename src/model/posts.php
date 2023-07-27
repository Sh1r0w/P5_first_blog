<?php

declare(strict_types=1);


class ListPost
{ 
    public function getPost()
{
    $statement = DbConnect::connectDatabase()->query(
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
}

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

Class deletePost extends ListPost
{

    public function deletePost(int $id)
{
    if (isset($id)) {
        $statement = DbConnect::connectDatabase()->prepare(
            "DELETE FROM ae_post WHERE id = $id"
        );

        $statement->execute();
        
        header('location: posts');
    } else {
        header('location: 404');
        echo $id;
    }
}
}