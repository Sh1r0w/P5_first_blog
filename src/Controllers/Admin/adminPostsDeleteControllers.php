<?php

namespace Controllers\Admin;

class adminPostsDeleteControllers
{
    public function postsDelete($id, $value, \Controllers\Fonction\factory $fact)
    {
        if(isset($value) == true){
        $fact->instance('Controllers\Repository', 'adminRepo')->postsDelete($id);
        header('location: postsListValid');
    }
}
}