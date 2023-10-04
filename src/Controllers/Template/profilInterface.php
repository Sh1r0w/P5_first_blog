<?php

namespace Controllers\Template;

interface ProfilInterface
{
    public function __construct();

    public function get(int $id): object;
}
