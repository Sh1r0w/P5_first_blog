<?php

namespace Controllers\Admin;

class adminPostsDeleteControllers
{
    public function postsDelete($id, $value)
    {
        if(isset($value) == true){
        $fact = \Controllers\fonction\factory::getInstance();
        $fact->instance('Controllers\Repository', 'adminRepo')->postsDelete($id);
        header('location: postsListValid');
    }
}
}