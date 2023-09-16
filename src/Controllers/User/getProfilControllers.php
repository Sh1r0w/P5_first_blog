<?php

namespace Controllers\User;

use Controllers\Repository\profileRepo;

class getProfilControllers
{
    public $profile;

    public function getUser($data){
        while($row = $data->fetch()){
            $profil = [
                'id' => $row['id'],
                'lastname' => $row['lastname'],
                'firstname' => $row['firstname'],
                'citation' => $row['citation'],
                'img' => $row['pictures'],
                'email' => $row['log'],

            ];
             $this->profile[] = $profil;
        }
        return $this->profile;
        
    }
}