<?php 

namespace Model\User;

class getProfilModel
{
    public function getUser($id)
    {

        $fact = \Controllers\Fonction\factory::getInstance();
        return $fact->instance('Controllers\Repository', 'profilRepo')->get($id);
    }
}