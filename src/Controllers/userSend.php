<?php

namespace Controllers;

class userSend

{
    protected $firstName = null;
    protected $lastName = null;
    protected $citation = null;
    protected $img = null;
    protected $id = null;

    public function __construct(array $input){
        var_dump($_FILES['picture']);
        $firstName = $input['firstname'];;
        $lastName = $input['lastname'];
        $citation = $input['citation'];
        $img = $_FILES['picture']['name'];
        $id = $_SESSION['id'];
        echo $id;
        if(isset($_FILES['picture']) && $_FILES['picture']['error'] == 0 && $_FILES['picture']['size'] <= 1000000)
        {
            $fileInfo = pathinfo($_FILES['picture']['name']);
            $extension = $fileInfo['extension'];
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            if(in_array($extension, $allowedExtensions))
            {
                move_uploaded_file($_FILES['picture']['tmp_name'], '../uploads/' . basename($_FILES['picture']['name']));
                echo 'test image';
                //var_dump($input);
            }

            $statement = \Controllers\Fonction\db::connectDatabase()->prepare(
                "INSERT INTO ae_user(firstname, lastname,pictures, citation, id_login) VALUES(?,?,?,?,?)"
            );
            $sendUser = $statement->execute([$firstName, $lastName, $img, $citation, $id]);
            return ($sendUser > 0);
        } else {
            echo 'nop';
        }


    }
}