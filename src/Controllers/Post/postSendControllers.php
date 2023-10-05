<?php

namespace Controllers\Post;

/* The `PostSendControllers` class is responsible for sending post with a title, chapo, content,
author, and image. */
class PostSendControllers
{
    protected $title = null;
    protected $content = null;
    protected $chapo = null;
    protected $author = null;
    protected $id = null;

    public function postSend($title, $chapo, $content, $author, \Controllers\Fonction\Factory $fact)
    {
        if (isset($title, $chapo, $content, $author) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
            $img = $fact->instance('Controllers\Fonction', 'GetImg')->getImg();
            $fact->instance('Model\post', 'PostSendModel')->postSend($title, $chapo, $content, $author, $img, $fact);
        }
        header('location: post');
    }
}
