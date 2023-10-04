<?php

namespace Controllers\Post;

/* The `PostUpdateControllers` class is responsible for updating post in a repository based on user
input. */
class PostUpdateControllers
{
    public function postUpdate(array $input, int $id, \Controllers\Fonction\Factory $fact): void
    {
        if (isset($id) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
            $fact->instance('Model\post', 'PostUpdateModel')->postUpdate($input, $id, $fact);
        }


        header('location: post');
    }
}
