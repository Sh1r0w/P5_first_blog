<?php

namespace Controllers\Admin;

class adminCommentUpdateControllers
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
    public function commentUpdate($id, $key, \Controllers\Fonction\factory $fact)
    {
        $fact->instance('Controllers\Repository', 'adminRepo')->commentUpdate($id, $key);
        header('location: \commentListValid');
    }
}