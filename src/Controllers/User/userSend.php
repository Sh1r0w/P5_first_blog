<?php

namespace Controllers\User;

/* The `class userSend` is a PHP class that handles the logic for sending user data. It has a
constructor method `userSend` that takes an array of input data as a parameter. */
class userSend

{

    protected $firstname = null;
    protected $lastname = null;
    protected $citation = null;
    protected $img = null;
    protected $id = null;

    public function userSend(array $input, $count, $fact)
    {
        $openSession = $fact->instance('Controllers\Fonction', 'session');
        $img = $_FILES['picture']['name'];

        if (isset($id)) {
            $fact->instance('Model\User', 'userPush')->userPush($input['firstname'], $input['lastname'], $input['citation'], $openSession->idCo, $img, $count, $fact);
            
            if (isset($firstname, $lastname, $id)) {
                
                $statement = \Controllers\Fonction\db::connectDatabase()->dbConnect->prepare(
                    "SELECT * FROM ae_connect a LEFT JOIN ae_user e ON a.id = e.id_login WHERE a.id = ?"
                );
                $statement->execute([$id]);
                $list = $statement->fetch();
                $openSession->firstname = $list['firstname'];
                $openSession->lastname = $list['lastname'];
                $openSession->citation = $list['citation'];
                $openSession->idUs = $list['id'];
                $openSession->admin = $list['globalAdmin'];
                header('location: /');
            }
            header('location: /posts');
        } else {
            echo 'nop';
        }
    }
}
