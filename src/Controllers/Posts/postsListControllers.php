<?php

namespace Controllers\Posts;

class postsListControllers
{ 

    public $posts;

    
   public function postsList($data)
{
    if(isset($data)){
        $this->posts = $data;
    }
    return $this->posts;

}
}