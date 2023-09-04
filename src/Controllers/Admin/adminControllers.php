<?php

namespace Controllers\Admin;

/* The adminControllers class in PHP has a userList method that sets and returns a user list. */
class adminControllers
{
    public $userList;
    public function userList($data)
    {
        if(isset($data)){
            $this->userList = $data;
        }
        return $this->userList;
    }


}