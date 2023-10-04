<?php

namespace Controllers\Admin;

class AdminCommentUpdateControllers
{
   /**
    * The commentUpdate function updates a comment in the admin repository and redirects to the
    * commentListValid page.
    *
    * @param id The id parameter is the identifier of the comment that needs to be updated. It is used
    * to locate the specific comment in the database.
    * @param key The key parameter is used to identify the specific comment that needs to be updated.
    * It is likely a unique identifier such as a comment ID or a comment key.
    */
    public function commentUpdate(int $id, int $key, \Controllers\Fonction\Factory $fact)
    {
        if ($_POST['csrf_token'] === $_SESSION['csrf_token']) {
            $fact->instance('Controllers\Repository', 'AdminRepo')->commentUpdate($id, $key);
        }
        header('location: \commentListValid');
    }
}
