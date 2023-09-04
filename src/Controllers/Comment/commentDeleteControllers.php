<?php

namespace Controllers\Comment;

/* The commentDeleteControllers class is responsible for deleting a comment and redirecting the user to
the post page. */
class commentDeleteControllers
{
    public function commentDelete($id, $key)
    {
        $fact = \Controllers\Fonction\factory::getInstance();
        $fact->instance('Controllers\Repository', 'commentRepo')->delete($id);
        header('location: http://localhost:3000/postsRead?id=' . $key);
    }
}