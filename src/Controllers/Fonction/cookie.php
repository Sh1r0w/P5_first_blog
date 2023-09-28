<?php

namespace Controllers\Fonction;

class cookie
{
    public function cookie()
    {

        setcookie(
            "BLOG_COOKIE",
            uniqid(),
            [
                'expires' => time() + 86400,
                'secure' => true,
                'httponly' => true,
                'samesite' => 'Strict',

                ]
        );
    }
}
