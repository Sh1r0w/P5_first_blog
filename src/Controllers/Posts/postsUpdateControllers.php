<?php

namespace Controllers\Posts;

/* The `postsUpdateControllers` class is responsible for updating posts in a repository based on user
input. */
class postsUpdateControllers
{
    
    public function postUpdate(array $input, $id, \Controllers\Fonction\factory $fact)
    {
        if(isset($input, $id)){
            $fact->instance('Model\Posts','postsUpdateModel')->postsUpdate($input, $id, $fact);
        }

        
        header('location: posts');
    }
}
