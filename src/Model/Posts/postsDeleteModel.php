<?php

namespace Model\Posts;

/* The postsDeleteModel class is responsible for deleting a post by calling the postsDelete method in
the postsRepo class. */
class postsDeleteModel
{

    public function postsDelete($id)
    {
        $fact = $fact = \Controllers\Fonction\factory::getInstance();
    $fact->instance('Controllers\Repository', 'postsRepo')->postsDelete($id);
    }
}