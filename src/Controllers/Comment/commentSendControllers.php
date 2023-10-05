<?php

namespace Controllers\Comment;

/* The commentSend class is used for sending comments. */
class CommentSendControllers
{
    public function commentSend($content, $idpost, \Controllers\Fonction\Factory $fact)
    {

        if ($_POST['csrf_token'] === $_SESSION['csrf_token']) {
            $fact->instance('Controllers\Repository', 'CommentRepo')->create($content, $idpost);
            header('location: /postRead?id=' . $idpost);
        }
    }
}
