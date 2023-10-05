<?php

namespace Controllers\Admin;

/* The AdminControllers class in PHP has a userList method that sets and returns a user list. */
class AdminControllers
{
    public $userList;
    public function userList(object $data): object
    {

            $this->userList = $data;

        return $this->userList;
    }
}
