<?php

namespace Controllers;

class userSend

{

    protected $firstname = null;
    protected $lastname = null;
    protected $citation = null;
    protected $img = null;
    protected $id = null;

    public function __construct(array $input)
    {
        $firstname = $input['firstname'];;
        $lastname = $input['lastname'];
        $citation = $input['citation'];
        $img = $_FILES['picture']['name'];
        $id = $_SESSION['idCo'];

        if (isset($id)) {
            $statement = \Controllers\Fonction\db::connectDatabase()->prepare(
                "INSERT INTO ae_user(firstname, lastname,pictures, citation, id_login) VALUES(?,?,?,?,?)"
            );
            $img = new \Controllers\Fonction\img;
            $sendUser = $statement->execute([$firstname, $lastname, $img->name = $_SESSION['img'], $citation, $id]);
            if (isset($firstname, $lastname, $id)) {
                $statement = \Controllers\Fonction\db::connectDatabase()->prepare(
                    "SELECT * FROM ae_connect a LEFT JOIN ae_user e ON a.id = e.id_login WHERE a.id = ?"
                );
                $statement->execute([$id]);
                $result = $statement->fetch();
                new \Controllers\Fonction\session($result);
                header('location: /');
            }
            header('location: /user');
            return ($sendUser > 0);
        } else {
            echo 'nop';
        }
    }
}
