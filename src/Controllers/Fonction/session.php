<?php

namespace Controllers\Fonction;

class session
{
    public function __construct(array $input)
    {
        var_dump($input);
        $_SESSION['logged_user'] = $input[1];
        $_SESSION['idCo'] = $input[0];
        $_SESSION['idUs'] = $input['id'];
        $_SESSION['firstname'] = $input['firstname'];
        $_SESSION['lastname'] = $input['lastname'];
        $_SESSION['img'] = $input[6];
        $_SESSION['citation'] = $input['citation'];
        $_SESSION['admin'] = $input['globalAdmin'];
        $_SESSION['flash'] = null;
    }
}
