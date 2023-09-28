<?php

namespace Controllers\Comment;

/* The commentDeleteControllers class is responsible for deleting a comment and redirecting the user to
the post page. */
class commentDeleteControllers
{
    public function commentDelete($id, $key,\Controllers\Fonction\factory $fact)
    {
        if($_POST['csrf_token'] === $_SESSION['csrf_token']){
        $fact->instance('Controllers\Repository', 'commentRepo')->delete($id);
        }
        header('location: postRead?id=' . $key);
    }
}