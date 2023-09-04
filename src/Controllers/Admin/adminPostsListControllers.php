<?php

namespace Controllers\Admin;

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