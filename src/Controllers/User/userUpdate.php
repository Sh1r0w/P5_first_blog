<?php

namespace Controllers\User;

/* The userUpdate class is responsible for updating user information in a PHP application. */
class userUpdate extends \Controllers\User\userSend
{
    public function userUpdate(array $input, $count,\Controllers\Fonction\factory $fact, $picture = null){
        

        $openSession = $fact->instance('Controllers\Fonction', 'session');
        $id = $openSession->idUs;

        if ($picture != null) {
            unlink($openSession->img);
            $openSession->img = $picture;
        }
        
        if(isset($_SESSION['idCo'], $_SESSION['idUs'])){
        $statement = \Controllers\Fonction\db::connectDatabase()->dbConnect->prepare(
            "UPDATE ae_user SET firstname = ?, lastname = ?, citation = ?, pictures = ? WHERE id = $id"
        );
        $sendUser = $statement->execute([$input['firstname'], $input['lastname'],  $input['citation'], $picture = $openSession->img]);
        header('location: /user');
        $openSession->firstname = $input['firstname'];
        $openSession->lastname = $input['lastname'];
        $openSession->citation = $input['citation'];
        
        return ($sendUser > 0);
        

    } elseif(isset($_SESSION['idUs']) == null){
        parent::userSend($input, $count, $fact);
    }

    }

}