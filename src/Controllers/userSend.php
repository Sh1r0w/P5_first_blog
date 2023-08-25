<?php

namespace Controllers;

class userSend

{

    protected $firstname = null;
    protected $lastname = null;
    protected $citation = null;
    protected $img = null;
    protected $id = null;

    public function userSend(array $input)
    {
        $fact = \Controllers\Fonction\factory::getInstance();
        $firstname = $input['firstname'];;
        $lastname = $input['lastname'];
        $citation = $input['citation'];
        $img = $_FILES['picture']['name'];
        $id = $_SESSION['idCo'];

        if (isset($id)) {
            $sendUser = $fact->instance('Model', 'userPush')->userPush($firstname, $lastname, $citation, $id, $img);
            if (isset($firstname, $lastname, $id)) {
                $statement = \Controllers\Fonction\db::connectDatabase()->prepare(
                    "SELECT * FROM ae_connect a LEFT JOIN ae_user e ON a.id = e.id_login WHERE a.id = ?"
                );
                $statement->execute([$id]);
                $result = $statement->fetch();
                new \Controllers\Fonction\session($result);
                header('location: /');
            }
            header('location: /posts');
            return ($sendUser > 0);
        } else {
            echo 'nop';
        }
    }
}
