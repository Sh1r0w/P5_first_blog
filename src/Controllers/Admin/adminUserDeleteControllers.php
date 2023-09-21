<?php

namespace Controllers\Admin;

class adminUserDeleteControllers
{
    public function adminUserDelete($id, \Controllers\Fonction\factory $fact)
    {
        $fact->instance('Controllers\Repository', 'adminRepo')->userDelete($id);
        header('location: userList');
    }
}