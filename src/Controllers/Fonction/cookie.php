<?php

namespace Controllers\Fonction;

class Cookie
{
    public function cookie(): void
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
