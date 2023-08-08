<?php

namespace Controllers;

class userSend

{
    protected $firstName = null;
    protected $lastName = null;
    protected $citation = null;
    
    public function __construct(array $input){

        $firstName = $input['firstname'];;
        $lastName = $input['lastname'];
        $citation = $input['citation'];

        if(isset($_FILES['picture']) && $_FILES['picture']['error'] == 0 && $_FILES['picture']['size'] <= 1000000)
        {
            $fileInfo = pathinfo($_FILES['picture']['name']);
            $extension = $fileInfo['extension'];
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            if(in_array($extension, $allowedExtensions))
            {
                move_uploaded_file($_FILES['picture']['tmp_name'], '../uploads/' . basename($_FILES['picture']['name']));
                echo 'test image';
                var_dump($input);
            }

            $statement = \Controllers\Fonction\db::connectDatabase()->prepare(
                "INSERT INTO ae_user(firstname, lastname, citation, id_login) VALUES(?,?,?,?)"
            );
            $sendUser = $statement->execute([$firstName, $lastName, $citation, $_SESSION['id']]);
            return ($sendUser > 0);
        }


    }
}