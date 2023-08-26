<?php

namespace Controllers;

class commentReadControllers
{
    public $commentsRead;

    public function commentReadControllers($data)
    {

        if(isset($data))
        {
            return $this->commentsRead = $data;
        }/*else{
            header('location: posts');
        }*/

    }
}