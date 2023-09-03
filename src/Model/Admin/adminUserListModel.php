<?php

namespace Model\Admin;

class adminUserListModel
{
    public $users;
    public function __construct()
    {
        $fact = \Controllers\Fonction\factory::getInstance();
        $list = $fact->instance('Controllers\Repository', 'adminRepo')->userList();
        while($row = $list->fetch()){
            $user = [
                'id' => $row['id'],
                'firstName' => $row['firstname'],
                'lastName' => $row['lastname'],
                'picture' => $row['pictures'],
                'admin' => $row['globalAdmin'],
            ];
            $this->users[] = $user;
        }
    }
}