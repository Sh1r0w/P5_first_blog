<?php

namespace Controllers\Post;



/* The postDeleteControllers class is responsible for deleting a post based on its ID. */

Class postDeleteControllers
{

    public function postDelete(int $id, \Controllers\Fonction\factory $fact)
{
    if(isset($id) && $_POST['csrf_token'] === $_SESSION['csrf_token']){     
    $fact->instance('Model\post', 'postDeleteModel')->postDelete($id, $fact);
    }
    header('location: post');
}
}