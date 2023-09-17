<?php

namespace Controllers\Admin;

/**
 * The adminCommentDeleteControllers class is responsible for deleting a comment and redirecting to the
 *  commentListValid page. 
 */
class adminCommentDeleteControllers
{
    public function commentDelete($id, \Controllers\Fonction\factory $fact)
    {
        $fact->instance('Controllers\Repository', 'adminRepo')->commentDelete($id);
        header('location: commentListValid');
    }
}