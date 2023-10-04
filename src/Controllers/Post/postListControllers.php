<?php

namespace Controllers\Post;

/* The "PostListControllers" class is used to manage a list of post. */
class PostListControllers
{
    public $post;

    public function postList(object $data): object
    {

            $this->post = $data;

        return $this->post;
    }
}
