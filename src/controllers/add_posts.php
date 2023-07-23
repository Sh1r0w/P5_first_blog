<?php


function sendPost(array $input)
{
    require '../src/controllers/db.php';
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

};
