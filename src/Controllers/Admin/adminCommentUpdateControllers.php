<?php

namespace Controllers\Admin;

class adminCommentUpdateControllers
{
    public function commentUpdate($id, $key)
    {
        $fact = \Controllers\Fonction\factory::getInstance();
        $fact->instance('Controllers\Repository', 'adminRepo')->commentUpdate($id, $key);
        header('location: \commentListValid');
    }
}