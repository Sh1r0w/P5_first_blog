<?php

namespace Model\User;

class userPush

{
    private $count = 0;
    public function userPush($firstname, $lastname, $citation, $id, $img, $countCkeck)
    {
        $statement = \Controllers\Fonction\db::connectDatabase()->prepare(
            "INSERT INTO ae_user(firstname, lastname,pictures, citation, id_login, globalAdmin) VALUES(?,?,?,?,?,?)"
        );
        if($countCkeck[0] == '1'){
            $this->count = '1';
        }
        $img = new \Controllers\Fonction\img;
        $statement->execute([$firstname, $lastname, $img->name = $_SESSION['img'], $citation, $id, $this->count]);
        
        
    }
}