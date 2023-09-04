<?php

namespace Controllers\Posts;

/* The `postsUpdateControllers` class is responsible for updating posts in a repository based on user
input. */
class postsUpdateControllers
{
    
    public function postUpdate(array $input, $id)
    {
        if(isset($input, $id)){
            $fact = \Controllers\Fonction\factory::getInstance();
            $fact->instance('Model\Posts','postsUpdateModel')->postsUpdate($input, $id);
        }

        
        header('location: posts');
    }
}
