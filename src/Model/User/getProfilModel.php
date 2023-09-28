<?php

namespace Model\User;

class getProfilModel
{
    public function getUser($id, \Controllers\Fonction\factory $fact)
    {

        return $fact->instance('Controllers\Repository', 'profilRepo')->get($id);
    }
}
