<?php



function sendPost(string $post, array $input)
{
    require 'src/model/posts.php';
    $title = null;
    $texte = null;

    if (!empty($input['title']) && !empty($input['texte'])) {
        $title = $input['title'];
        $texte = $input['texte'];
        echo ('1');
    } else {
        die('Formulaire Vide');
        echo ('2');
    };

    $success = createPost($title, $texte);
    echo ('3');
    if(!$success) {
        die('Ajout impossible');

        echo ('4');
    } else {
        header('Location: posts?action=title&texte=' . $post);
        echo ('5');
    };

};

