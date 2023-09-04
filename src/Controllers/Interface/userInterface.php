<?php

namespace Controllers\Interface;

interface userInterface
{
    public function __construct();

    public function userCreate();

    public function userRead($id);

    public function userUpdate($id);

}