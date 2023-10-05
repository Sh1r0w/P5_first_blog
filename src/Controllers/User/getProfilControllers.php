<?php

namespace Controllers\User;

class GetProfilControllers
{
    public $profile;

    /**
     * The function retrieves user data from a database and returns it as an array of profiles.
     *
     * @param data The parameter `` is expected to be a result set object returned by a database
     * query. It is assumed that the `` object has a method `fetch()` which retrieves the next row
     * from the result set.
     *
     * @return an array of user profiles.
     */
    public function getUser($data)
    {
        while ($row = $data->fetch()) {
            $profil = [
                'id' => $row['id'],
                'lastname' => $row['lastname'],
                'firstname' => $row['firstname'],
                'citation' => $row['citation'],
                'img' => $row['pictures'],
                'email' => $row['log'],
                'pdf' => $row['cv'],

            ];
             $this->profile[] = $profil;
        }
        return $this->profile;
    }
}
