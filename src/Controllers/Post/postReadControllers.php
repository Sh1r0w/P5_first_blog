<?php

namespace Controllers\Post;

/* The class "postReadControllers" is used to handle the reading of post and redirect to the "post"
page if no data is provided. */
class postReadControllers
{
    public $postRead;

    public function postReadControllers($data)
    {

        if (isset($data)) {
            return $this->postRead = $data;
        } else {
            header('location: post');
        }
        return $this->postRead;
    }
}
