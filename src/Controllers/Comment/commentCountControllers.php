<?php

namespace Controllers\Comment;

class commentCountControllers
{
    public function countComment()
    {
        $fact = \Controllers\Fonction\factory::getInstance();
        $count = $fact->instance('Controllers\Repository', 'commentRepo')->count();
        return $count->fetchAll(\PDO::FETCH_NUM);
    }
}