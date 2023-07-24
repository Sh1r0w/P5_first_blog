<?php


function postsSend(array $input, $database)
{
    $title = null;
    $texte = null;

    if (!empty($input['title']) && !empty($input['texte'])) {
        $title = $input['title'];
        $texte = $input['texte'];

    } else {
        die('Formulaire Vide');
    };

    $success = createPost($title, $texte, $database);


    if(!$success) {
        die('Ajout impossible');

    } else {
        header('location: posts');

    };

}

function postsList($database) 

{

    $l = getPost($database);

    return $l;
    
}

function postsDelete($id, $database)

{

    $success = deletePost($id, $database);

    if($success)
    {
        header('location: posts');
        
    }

}