<?php

namespace Controllers\Post;

/* The PostDeleteControllers class is responsible for deleting a post based on its ID. */

class PostDeleteControllers
{
    public function postDelete(int $id, \Controllers\Fonction\Factory $fact)
    {
        if ($_POST['csrf_token'] === $_SESSION['csrf_token']) {
            $fact->instance('Model\post', 'PostDeleteModel')->postDelete($id, $fact);
        }
        header('location: post');
    }
}
