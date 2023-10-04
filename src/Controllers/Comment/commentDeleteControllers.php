<?php

namespace Controllers\Comment;

/* The CommentDeleteControllers class is responsible for deleting a comment and redirecting the user to
the post page. */
class CommentDeleteControllers
{
    public function commentDelete(int $id, int $key, \Controllers\Fonction\Factory $fact)
    {
        if ($_POST['csrf_token'] === $_SESSION['csrf_token']) {
            $fact->instance('Controllers\Repository', 'CommentRepo')->delete($id);
        }
        header('location: postRead?id=' . $key);
    }
}
