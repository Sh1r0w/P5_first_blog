<?php

namespace Controllers\Fonction;

class csp {
    public function __construct()
    {
        header("Content-Security-Policy: default-src 'self' ; style-src 'self' 'unsafe-inline' cdn.jsdelivr.net; script-src 'unsafe-inline' 'self' cdn.jsdelivr.net");
    }
}