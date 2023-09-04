<?php

namespace Controllers\Admin;

/* The adminPostsUpdateControllers class is responsible for updating posts in the admin repository and
redirecting to the postsListValid page. */
class adminPostsUpdateControllers
{
    public function postsUpdate($id, $key)
    {
        $fact = \Controllers\Fonction\factory::getInstance();
        $fact->instance('Controllers\Repository', 'adminRepo')->postsUpdate($id, $key);
        header('location: \postsListValid');
    }
}