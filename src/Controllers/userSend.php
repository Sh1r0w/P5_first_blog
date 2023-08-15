<?php

namespace Controllers;

class userSend

{

    protected $firstName = null;
    protected $lastName = null;
    protected $citation = null;
    protected $img = null;
    protected $id = null;

    public function __construct(array $input)
    {
        $firstName = $input['firstname'];;
        $lastName = $input['lastname'];
        $citation = $input['citation'];
        $img = $_FILES['picture']['name'];
        $id = $_SESSION['idCo'];

        if (isset($id)) {
            $statement = \Controllers\Fonction\db::connectDatabase()->prepare(
                "INSERT INTO ae_user(firstname, lastname,pictures, citation, id_login) VALUES(?,?,?,?,?)"
            );
                $img = new \Controllers\Fonction\img;
                $sendUser = $statement->execute([$firstName, $lastName, $img->name = null, $citation, $id]);
                header('location: /user');
                return ($sendUser > 0);

        } else {
            echo 'nop';
        }
    }
}
