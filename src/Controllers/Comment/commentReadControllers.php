<?php

namespace Controllers\Comment;

/* The class CommentReadControllers is used to store and retrieve comments. */
class CommentReadControllers
{
    public $commentsRead;

    public function commentReadControllers(mixed $data): array
    {
            return $this->commentsRead = $data;
    }
}
