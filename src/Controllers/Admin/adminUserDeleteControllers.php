<?php

namespace Controllers\Admin;

class AdminUserDeleteControllers
{
    public function adminUserDelete($id, \Controllers\Fonction\Factory $fact)
    {
        if ($_POST['csrf_token'] === $_SESSION['csrf_token']) {
            $fact->instance('Controllers\Repository', 'AdminRepo')->userDelete($id);
        }
        header('location: userList');
    }
}
