<?php

namespace Controllers\Admin;

/**
 * The AdminCommentDeleteControllers class is responsible for deleting a comment and redirecting to the
 *  commentListValid page.
 */
class AdminCommentDeleteControllers
{
    public function commentDelete($id, \Controllers\Fonction\Factory $fact)
    {
        if ($_POST['csrf_token'] === $_SESSION['csrf_token']) {
            $fact->instance('Controllers\Repository', 'AdminRepo')->commentDelete($id);
        }
        header('location: commentListValid');
    }
}
