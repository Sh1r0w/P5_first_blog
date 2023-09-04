<?php

namespace Controllers\Admin;

/* The adminUserControllers class is responsible for updating a user's information and redirecting to
the user list page. */
class adminUserControllers
{

    public function userUpdate($id, $key)
    {
        $fact = \Controllers\Fonction\factory::getInstance();
        $fact->instance('Controllers\Repository', 'adminRepo')->userUpdate($id, $key);
        header('location: \userList');
    }

}