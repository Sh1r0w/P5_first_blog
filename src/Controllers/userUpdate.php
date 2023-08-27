<?php

namespace Controllers;

class userUpdate extends \Controllers\userSend
{
    public function userUpdate(array $input, $count, $picture = null){
        $id = $_SESSION['idUs'];
        $firstName = $input['firstname'];;
        $lastName = $input['lastname'];
        $citation = $input['citation'];

        if ($picture != null) {
            unlink($_SESSION['img']);
            $_SESSION['img'] = $picture;
        }
        
        if(isset($_SESSION['idCo'], $_SESSION['idUs'])){
        $statement = \Controllers\Fonction\db::connectDatabase()->prepare(
            "UPDATE ae_user SET firstname = ?, lastname = ?, citation = ?, pictures = ? WHERE id = $id"
        );
        $sendUser = $statement->execute([$firstName, $lastName,  $citation, $picture = $_SESSION['img']]);
        header('location: /user');
        $_SESSION['firstname'] = $firstName;
        $_SESSION['lastname'] = $lastName;
        $_SESSION['citation'] = $citation;
        
        return ($sendUser > 0);
        

    } elseif(isset($_SESSION['idUs']) == null){
        parent::userSend($input, $count);
    }

    }

}