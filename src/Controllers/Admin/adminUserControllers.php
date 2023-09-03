<?php

namespace Controllers\Admin;

class adminUserControllers
{

    public function userUpdate($id, $key)
    {
        $fact = \Controllers\Fonction\factory::getInstance();
        $fact->instance('Controllers\Repository', 'adminRepo')->userUpdate($id, $key);
        header('location: \userList');
    }

}