<?php

namespace Controllers\Admin;

/* The adminpostUpdateControllers class is responsible for updating post in the admin repository and
redirecting to the postListValid page. */
class adminPostUpdateControllers
{
    public function postUpdate($id, $key,\Controllers\Fonction\factory $fact)
    {
        if($_POST['csrf_token'] === $_SESSION['csrf_token']){
        $fact->instance('Controllers\Repository', 'adminRepo')->postUpdate($id, $key);
        }
        header('location: \postListValid');
    }
}