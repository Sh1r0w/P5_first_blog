<?php

namespace Model\Post;

/* The `postSendModel` class is responsible for sending post with a title, chapo, content, author,
and image. */
class postSendModel
{
    public function postSend($title, $chapo, $content, $author, $img, $fact)
    {
        $fact->instance('Controllers\Repository', 'postRepo')->postSend($title, $chapo, $content, $author, $img);
    }
}
