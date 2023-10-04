<?php

namespace Controllers\Fonction;

class GetImg
{
    public $name = null;

    /**
     * The function `getImg()` checks if the uploaded file is an image with allowed extensions, moves
     * it to a specific directory with a unique name, and returns the file name.
     *
     * @return the value of the `->name` variable.
     */
    public function getImg(): ?string
    {

        $fileInfo = pathinfo($_FILES['picture']['name']);
        $extension = $fileInfo['extension'];
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($extension, $allowedExtensions)) {
            move_uploaded_file(
                $_FILES['picture']['tmp_name'],
                'uploads/profile/254' . $_SESSION['idCo'] . date('YmdHis') . '.' . $extension
            );
            $this->name = 'uploads/profile/' . '254' . $_SESSION['idCo'] . date('YmdHis') . '.' . $extension;
        }
        return $this->name;
    }
}
