<?php


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

    //$success = createPost($title, $texte, $database);


    if(!$success) {
        die('Ajout impossible');

    } else {
        header('location: posts');

    };

}

function postsList() 

{

    $postList = new ListPost;
    return $postList->getPost();
    
}

function postsDelete($id)

{
    if(isset($id) && $id > 0){
   $delete = new DeletePost;
   $delete->deletePost($id);
} else {
    header('location: posts');
}


}