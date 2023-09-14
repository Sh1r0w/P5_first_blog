<?php

namespace Controllers\Posts;



/* The postsDeleteControllers class is responsible for deleting a post based on its ID. */

Class postsDeleteControllers
{

    public function postsDelete(int $id, \Controllers\Fonction\factory $fact)
{
    if(isset($id)){     
    $fact->instance('Model\Posts', 'postsDeleteModel')->postsDelete($id, $fact);
    }
    header('location: posts');
}
}