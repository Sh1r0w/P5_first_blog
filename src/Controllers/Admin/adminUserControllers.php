<?php

namespace Controllers\Admin;

/* The AdminUserControllers class is responsible for updating a user's information and redirecting to
the user list page. */
class AdminUserControllers
{
    public function userUpdate($id, $key, \Controllers\Fonction\Factory $fact)
    {
        if ($_POST['csrf_token'] === $_SESSION['csrf_token']) {
            $fact->instance('Controllers\Repository', 'AdminRepo')->userUpdate($id, $key);
        }
        header('location: \userList');
    }
}
