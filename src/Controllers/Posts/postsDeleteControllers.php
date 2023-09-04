<?php

namespace Controllers\Posts;



/* The postsDeleteControllers class is responsible for deleting a post based on its ID. */

Class postsDeleteControllers
{

    public function postsDelete(int $id)
{
    if(isset($id)){     
    $fact = $fact = \Controllers\Fonction\factory::getInstance();
    $fact->instance('Model\Posts', 'postsDeleteModel')->postsDelete($id);
    }
    header('location: posts');
}
}