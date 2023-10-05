<?php

namespace Controllers\Fonction;

/* The uploadPdf class allows for the uploading of PDF files and saves them with a specific naming
convention. */
class GetPdf
{
    public $name;

    /**
     * The function `getPdf()` uploads a PDF file to a specific directory and returns the file name.
     *
     * @return the name of the uploaded PDF file.
     */

    public function getPdf()
    {

        $fileInfo = pathinfo($_FILES['pdf']['name']);
        $extension = $fileInfo['extension'];
        $allowedExtensions = ['pdf'];
        if (in_array($extension, $allowedExtensions)) {
            move_uploaded_file(
                $_FILES['pdf']['tmp_name'],
                'uploads/cv/' . $_SESSION['firstname'] .
                '-' .
                $_SESSION['lastname'] .
                date('YmdHis') .
                '.' .
                $extension
            );
            $this->name = 'uploads/cv/' .
            $_SESSION['firstname'] .
            '-' .
            $_SESSION['lastname'] .
            date('YmdHis') .
            '.' .
            $extension;
        }
        return $this->name;
    }
}
