<?php

namespace Controllers\Template;

/* The code is defining an interface called `AdminInterface`. An interface in PHP is a collection of
method signatures that a class can implement. */
interface AdminInterface
{
    public function __construct();

    public function userList(): object;

    public function userUpdate(int $id, string $value): void;

    public function userDelete(int $id): void;

    public function postList(): object;

    public function postUpdate(int $id, string $value): void;

    public function postDelete(int $id): void;

    public function commentList(): object;

    public function commentUpdate(int $id, string $value): void;

    public function commentDelete(int $id): void;
}
