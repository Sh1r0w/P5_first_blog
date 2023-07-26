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

    $success = new sendPost;
    $success->createPost($title, $texte, $database);

    //$success = createPost($title, $texte, $database);


    if(!$success) {
        die('Ajout impossible');

    } else {
        header('location: posts');

    };

}

function postsList($database) 

{

    $postList = new ListPost;
    return $postList->getPost($database);
    
}

function postsDelete($id, $database)

{
    if(isset($id) && $id > 0){
   $delete = new DeletePost;
   $delete->deletePost($id, $database);
} else {
    header('location: posts');
}


}