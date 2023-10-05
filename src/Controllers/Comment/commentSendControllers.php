<?php

namespace Controllers\Comment;

/* The commentSend class is used for sending comments. */
class CommentSendControllers
{
    public function commentSend(string $content, int $idpost, \Controllers\Fonction\Factory $fact): void
    {

        if ($_POST['csrf_token'] === $_SESSION['csrf_token']) {
            $fact->instance('Controllers\Repository', 'CommentRepo')->create($content, $idpost);
            header('location: /postRead?id=' . $idpost);
        }
    }
}
