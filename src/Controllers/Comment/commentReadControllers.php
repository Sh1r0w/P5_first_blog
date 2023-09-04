<?php

namespace Controllers\Comment;


/* The class commentReadControllers is used to store and retrieve comments. */
class commentReadControllers
{
    public $commentsRead;

    public function commentReadControllers($data)
    {

        if(isset($data))
        {
            return $this->commentsRead = $data;
        }

    }
}