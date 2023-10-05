<?php

namespace Controllers\Post;

/* The class "PostReadControllers" is used to handle the reading of post and redirect to the "post"
page if no data is provided. */
class PostReadControllers
{
    public $postRead;

    public function postReadControllers(array $data): array
    {
        $this->postRead = $data;

        return $this->postRead;

        header('location: post');
    }
}
