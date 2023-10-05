<?php

namespace Controllers\Comment;

/* The class CommentReadControllers is used to store and retrieve comments. */
class CommentReadControllers
{
    public $commentsRead;

    public function commentReadControllers($data)
    {

        if (isset($data)) {
            return $this->commentsRead = $data;
        }
    }
}
