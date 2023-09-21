<?php

namespace Model\Admin;

/* The adminUserListModel class retrieves a list of users from the adminRepo repository and stores them
in an array. */
class adminUserListModel
{
    public $users;
    public function __construct(\Controllers\Fonction\factory $fact)
    {
        $list = $fact->instance('Controllers\Repository', 'adminRepo')->userList();
        while($row = $list->fetch()){
            $user = [
                'id' => $row['id'],
                'firstName' => $row['firstname'],
                'lastName' => $row['lastname'],
                'picture' => $row['pictures'],
                'admin' => $row['globalAdmin'],
                'idCo' => $row['id_login'],
            ];
            $this->users[] = $user;
        }
    }
}