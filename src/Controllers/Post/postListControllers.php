<?php

namespace Controllers\Post;

/* The "postListControllers" class is used to manage a list of post. */
class postListControllers
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
