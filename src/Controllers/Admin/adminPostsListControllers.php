<?php

namespace Controllers\Admin;

/* The adminPostsListControllers class is used to manage and display a list of posts. */
class adminPostsListControllers
{
    public $list;

    public function postsList($data)
    {
        if(isset($data)){
        $this->list[] = $data;
    }
    return $this->list;

    }
    
}