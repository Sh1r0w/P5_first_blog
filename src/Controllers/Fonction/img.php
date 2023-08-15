<?php

namespace Controllers\Fonction;

class img
{
    public $name;

    public function __construct()
    {
        $fileInfo = pathinfo($_FILES['picture']['name']);
        $extension = $fileInfo['extension'];
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($extension, $allowedExtensions)) {
            move_uploaded_file($_FILES['picture']['tmp_name'], 'uploads/'. '254' . $_SESSION['idCo'] .date('YmdHis') . '.' . $extension);
            $this->name = 'uploads/'. '254' . $_SESSION['idCo'] .date('YmdHis') . '.' . $extension;
            if ($_SESSION['img'] != null) {
                unlink($_SESSION['img']);
            }
            $_SESSION['img'] = $this->name;
            return $this->name;
        }
    }
}
