<?php

namespace Controllers\Admin;

class adminPostDeleteControllers
{
    public function postDelete($id, $value, \Controllers\Fonction\factory $fact)
    {
        if(isset($value) == true){
        $fact->instance('Controllers\Repository', 'adminRepo')->postDelete($id);
        header('location: postListValid');
    }
}
}