<?php

namespace Controllers\Admin;

class adminPostsUpdateControllers
{
    public function postsUpdate($id, $key)
    {
        $fact = \Controllers\Fonction\factory::getInstance();
        $fact->instance('Controllers\Repository', 'adminRepo')->postsUpdate($id, $key);
        header('location: \postsListValid');
    }
}