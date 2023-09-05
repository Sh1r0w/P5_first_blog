<?php

namespace Controllers\Interface;


/* The code is defining an interface called `userInterface` within the `Controllers\Interface`
namespace. */
interface userInterface
{
    public function __construct();

    public function userCreate();

    public function userRead($id);

    public function userUpdate($id);

}