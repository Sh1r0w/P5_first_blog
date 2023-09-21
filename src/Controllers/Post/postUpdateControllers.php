<?php

namespace Controllers\Post;

/* The `postUpdateControllers` class is responsible for updating post in a repository based on user
input. */
class postUpdateControllers
{
    
    public function postUpdate(array $input, $id, \Controllers\Fonction\factory $fact)
    {
        if(isset($input, $id)){
            $fact->instance('Model\post','postUpdateModel')->postUpdate($input, $id, $fact);
        }

        
        header('location: post');
    }
}
