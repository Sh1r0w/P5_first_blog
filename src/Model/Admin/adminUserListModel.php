<?php

namespace Model\Admin;

class AdminUserListModel
{
    public $users;
    /**
     * The function constructs an array of user data by fetching information from a repository using a
     * factory.
     *
     * @param \Controllers\Fonction\Factory fact The parameter `` is an instance of the `Factory`
     * class from the `Controllers\Fonction` namespace. It is used to create instances of different
     * classes.
     */
    public function __construct(\Controllers\Fonction\Factory $fact)
    {
        $list = $fact->instance('Controllers\Repository', 'AdminRepo')->userList();
        while ($row = $list->fetch()) {
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
