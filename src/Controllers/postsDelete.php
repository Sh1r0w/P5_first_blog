<?php

namespace Controllers;

/* The postsDelete class is responsible for deleting a post by calling the postsDelete method in the
postsRepo class and redirecting to the posts page. */

Class postsDelete
{

    public function postsDelete(int $id)
{
    $fact = $fact = \Controllers\Fonction\factory::getInstance();
    $fact->instance('Controllers\Repository', 'postsRepo')->postsDelete($id);
    header('location: posts');
}
}