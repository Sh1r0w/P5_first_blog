<?php

namespace Controllers\User;

use Controllers\Repository\profileRepo;

class getProfilControllers
{
    public $profile;

    public function getUser($data){
        while($row = $data->fetch()){
            $profil = [
                'lastname' => $row['lastname'],
                'firstname' => $row['firstname'],
                'citation' => $row['citation'],
                'img' => $row['pictures'],

            ];
             $this->profile[] = $profil;
        }
        return $this->profile;
        
    }
}