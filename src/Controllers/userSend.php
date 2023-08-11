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
        //var_dump($_FILES['picture']);
        $firstName = $input['firstname'];;
        $lastName = $input['lastname'];
        $citation = $input['citation'];
        $img = $_FILES['picture']['name'];
        $id = $_SESSION['idCo'];
        echo $id;
        if (isset($id)) {
            $statement = \Controllers\Fonction\db::connectDatabase()->prepare(
                "INSERT INTO ae_user(firstname, lastname,pictures, citation, id_login) VALUES(?,?,?,?,?)"
            );
            if (!empty($img)) {
                echo $img;
                $fileInfo = pathinfo($_FILES['picture']['name']);
                $extension = $fileInfo['extension'];
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                if (in_array($extension, $allowedExtensions)) {
                    move_uploaded_file($_FILES['picture']['tmp_name'], '../uploads/' . basename($_FILES['picture']['name']));
                }
                $sendUser = $statement->execute([$firstName, $lastName, $img, $citation, $id]);
                return ($sendUser > 0);
                header('location: /user');
            } else {
                $sendUser = $statement->execute([$firstName, $lastName, null, $citation, $id]);
                return ($sendUser > 0);
                header('location: /user');
            }
        } else {
            echo 'nop';
        }
    }
}
