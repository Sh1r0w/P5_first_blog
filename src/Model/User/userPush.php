<?php

namespace Model\User;

class userPush

{
    private $count = 0;
    public function userPush($firstname, $lastname, $citation, $id, $img, $countCheck)
    {
        $statement = \Controllers\Fonction\db::connectDatabase()->dbConnect->prepare(
            "INSERT INTO ae_user(firstname, lastname,pictures, citation, id_login, globalAdmin) VALUES(?,?,?,?,?,?)"
        );
        if($countCheck->result == '1'){
            $this->count = '1';
        }
        $img = new \Controllers\Fonction\img;
        $statement->execute([$firstname, $lastname, $img->name = $_SESSION['img'], $citation, $id, $this->count]);
        
        
    }
}