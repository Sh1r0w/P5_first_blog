<?php

namespace Controllers\Comment;

/* The commentCountControllers class counts the number of comments using a factory pattern. */
class commentCountControllers
{
    public function countComment()
    {
        $fact = \Controllers\Fonction\factory::getInstance();
        $count = $fact->instance('Controllers\Repository', 'commentRepo')->count();
        return $count->fetchAll(\PDO::FETCH_NUM);
    }
}