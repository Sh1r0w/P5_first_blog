<?php

namespace Controllers\Admin;

class adminPostDeleteControllers
{
    public function postDelete($id, $value, \Controllers\Fonction\factory $fact)
    {
        if (isset($value) == true && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
            $fact->instance('Controllers\Repository', 'adminRepo')->postDelete($id);
            header('location: postListValid');
        }
    }
}
