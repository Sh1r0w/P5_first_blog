<?php

namespace Controllers\Comment;

class commentDeleteControllers
{
    public function commentDelete($id, $key)
    {
        $fact = \Controllers\Fonction\factory::getInstance();
        $fact->instance('Controllers\Repository', 'commentRepo')->delete($id);
        header('location: http://localhost:3000/postsRead?id=' . $key);
    }
}