<?php

namespace Controllers;

/* The `class commentReadControllers` is a PHP class that represents a controller for reading comments.
It has a public property `` and a constructor method `commentReadControllers` that
takes in a parameter ``. */
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