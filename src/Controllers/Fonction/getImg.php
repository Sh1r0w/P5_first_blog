<?php

namespace Controllers\Fonction;

/* The `class img` is a PHP class that handles the uploading and processing of image files. */
class getImg
{
    public $name = null;

    public function getImg()
    {

        $fileInfo = pathinfo($_FILES['picture']['name']);
        $extension = $fileInfo['extension'];
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($extension, $allowedExtensions)) {
            move_uploaded_file($_FILES['picture']['tmp_name'], 'uploads/profile/254' . $_SESSION['idCo'] .date('YmdHis') . '.' . $extension);
            $this->name = 'uploads/profile/'. '254' . $_SESSION['idCo'] .date('YmdHis') . '.' . $extension;
            echo 'ok';
        }
        return $this->name;
        
    }
}
