<?php

namespace Controllers\Template;

/* The code is defining an interface called `UserInterface` within the `Controllers\Template`
namespace. */
interface UserInterface
{
    public function __construct();

    public function userCreate();

    public function userRead(int $id);

    public function userUpdate(int $id);

    public function userPasswordUpdate(string $password, int $id);
}
