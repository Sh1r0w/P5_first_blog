<?php

namespace Controllers\Admin;

/* The AdminPostUpdateControllers class is responsible for updating post in the admin repository and
redirecting to the postListValid page. */
class AdminPostUpdateControllers
{
    public function postUpdate(int $id, int $key, \Controllers\Fonction\Factory $fact): void
    {
        if ($_POST['csrf_token'] === $_SESSION['csrf_token']) {
            $fact->instance('Controllers\Repository', 'AdminRepo')->postUpdate($id, $key);
        }
        header('location: \postListValid');
    }
}
