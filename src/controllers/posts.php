<?php

/**
 * @param $input string get $title and $content for create posts
 */

function postsSend(array $input)
{
    $title = null;
    $texte = null;

    if (!empty($input['title']) && !empty($input['texte'])) {
        $title = $input['title'];
        $texte = $input['texte'];

    } else {
        die('Formulaire Vide');
    };

    $success = new sendPost;
    $success->createPost($title, $texte);


    if(!$success) {
        die('Ajout impossible');

    } else {
        header('location: posts');

    };

}

/**
 * return array list of posts
 */



/**
 * @var $id int get id for delete one posts
 */

function postsDelete($id)

{
    if(isset($id) && $id > 0){
   $delete = new DeletePost;
   $delete->deletePost($id);
} else {
    header('location: posts');
}


}