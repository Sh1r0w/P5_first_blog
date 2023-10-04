<?php

namespace Controllers\Template;

/* The code is defining an interface called `UserInterface` within the `Controllers\Template`
namespace. */
interface UserInterface
{
    public function __construct();

    public function userCreate(): object;

    public function userRead(int $id): array;

    public function userUpdate(int $id): object;

    public function userPasswordUpdate(string $password, int $id): void;
}
