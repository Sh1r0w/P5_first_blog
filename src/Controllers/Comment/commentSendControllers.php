<?php

namespace Controllers\Comment;

/* The commentSend class is used for sending comments. */
class commentSendControllers{

    public function commentSend($content, $idpost) {
        
        $fact = \Controllers\Fonction\factory::getInstance();
        $fact->instance('Controllers\Repository', 'commentRepo')->create($content, $idpost);
        header('location: /postsRead?id=' . $idpost);

    }
}