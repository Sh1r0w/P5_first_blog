<?php

namespace Controllers\Admin;

class AdminPostDeleteControllers
{
    public function postDelete(int $id, bool $value, \Controllers\Fonction\Factory $fact)
    {
        if (isset($value) == true && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
            $fact->instance('Controllers\Repository', 'AdminRepo')->postDelete($id);
            header('location: postListValid');
        }
    }
}
