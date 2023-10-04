<?php

namespace Controllers\Admin;

class AdminPostDeleteControllers
{
    public function postDelete(int $id, \Controllers\Fonction\Factory $fact): void
    {
        if ($_POST['csrf_token'] === $_SESSION['csrf_token']) {
            $fact->instance('Controllers\Repository', 'AdminRepo')->postDelete($id);
            header('location: postListValid');
        }
    }
}
