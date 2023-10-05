<?php

namespace Controllers\Admin;

/* The AdminPostUpdateControllers class is responsible for updating post in the admin repository and
redirecting to the postListValid page. */
class AdminPostUpdateControllers
{
    public function postUpdate($id, $key, \Controllers\Fonction\Factory $fact)
    {
        if ($_POST['csrf_token'] === $_SESSION['csrf_token']) {
            $fact->instance('Controllers\Repository', 'AdminRepo')->postUpdate($id, $key);
        }
        header('location: \postListValid');
    }
}
