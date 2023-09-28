<?php

namespace Model\Post;

/* The postDeleteModel class is responsible for deleting a post by calling the postDelete method in
the postRepo class. */
class postDeleteModel
{
    public function postDelete($id, \Controllers\Fonction\factory $fact)
    {
        $fact->instance('Controllers\Repository', 'postRepo')->postDelete($id);
    }
}
