<?php

namespace Model\Posts;

/* The `postsSendModel` class is responsible for sending posts with a title, chapo, content, author,
and image. */
class postsSendModel
{
    public function postsSend($title, $chapo ,$content, $author, $img)
    {
        $fact = \Controllers\Fonction\factory::getInstance();
        $fact->instance('Controllers\Repository', 'postsRepo')->postsSend($title, $chapo ,$content, $author, $img);
    }
}