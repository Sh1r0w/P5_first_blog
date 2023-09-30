<?php

namespace Controllers\Post;

/* The "PostListControllers" class is used to manage a list of post. */
class PostListControllers
{
    public $post;

    public function postList($data)
    {
        if (isset($data)) {
            $this->post = $data;
        }
        return $this->post;
    }
}
