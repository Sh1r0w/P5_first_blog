<?php

namespace Controllers\Admin;

/* The adminpostListControllers class is used to manage and display a list of post. */
class adminPostListControllers
{
    public $list;

    public function postList($data)
    {
        if(isset($data)){
        $this->list[] = $data;
    }
    return $this->list;

    }
    
}