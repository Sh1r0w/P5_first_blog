<?php

namespace Controllers\Admin;

class adminUserDeleteControllers
{
    public function adminUserDelete($id, \Controllers\Fonction\factory $fact)
    {
        if ($_POST['csrf_token'] === $_SESSION['csrf_token']) {
            $fact->instance('Controllers\Repository', 'adminRepo')->userDelete($id);
        }
        header('location: userList');
    }
}
