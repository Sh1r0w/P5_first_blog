<?php

namespace Model\Post;

class PostDeleteModel
{
    /**
     * The postDelete function calls the postDelete method of the PostRepo class in the
     * Controllers\Repository namespace using a Factory instance.
     *
     * @param id The parameter "id" is the identifier of the post that needs to be deleted.
     * @param \Controllers\Fonction\Factory fact The parameter `` is an instance of the `Factory`
     * class from the `Controllers\Fonction` namespace.
     */
    public function postDelete(int $id, \Controllers\Fonction\Factory $fact)
    {
        $fact->instance(
            'Controllers\Repository',
            'PostRepo'
        )->postDelete($id);
    }
}
