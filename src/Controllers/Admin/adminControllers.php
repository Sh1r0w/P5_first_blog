<?php

namespace Controllers\Admin;

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