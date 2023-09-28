<?php

namespace Controllers\Comment;

/* The commentCountControllers class counts the number of comments using a factory pattern. */
class commentCountControllers
{
    public $count;
    public function __construct(\Controllers\Fonction\factory $fact)
    {
        return $this->count = $fact->instance('Controllers\Repository', 'commentRepo')->count()->fetchAll(\PDO::FETCH_NUM);
    }
}
