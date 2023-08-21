<?php

namespace Controllers;

class userUpdate extends \Controllers\userSend
{
    public function userUpdate(array $input){
        $id = $_SESSION['idUs'];
        $firstName = $input['firstname'];;
        $lastName = $input['lastname'];
        $citation = $input['citation'];
        $test = $_FILES['picture'];
        echo 'user update';
        
        if(isset($_SESSION['idCo'], $_SESSION['idUs'])){
        $statement = \Controllers\Fonction\db::connectDatabase()->prepare(
            "UPDATE ae_user SET firstname = ?, lastname = ?, citation = ?, pictures = ? WHERE id = $id"
        );
        if(isset($test) != null)
        {
            $img = new \Controllers\Fonction\img;
        }
        
        $sendUser = $statement->execute([$firstName, $lastName,  $citation, $img->name = $_SESSION['img']]);
        header('location: /user');
        $_SESSION['firstname'] = $firstName;
        $_SESSION['lastname'] = $lastName;
        $_SESSION['citation'] = $citation;
        return ($sendUser > 0);
        

    } elseif(isset($_SESSION['idUs']) == null){
        parent::userSend($input);
    }

    }

}