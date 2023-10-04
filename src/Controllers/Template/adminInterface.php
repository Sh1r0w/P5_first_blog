<?php

namespace Controllers\Template;

/* The code is defining an interface called `AdminInterface`. An interface in PHP is a collection of
method signatures that a class can implement. */
interface AdminInterface
{
    public function __construct();

    public function userList();

    public function userUpdate(int $id, string $value);

    public function userDelete(int $id);

    public function postList();

    public function postUpdate(int $id, string $value);

    public function postDelete(int $id);

    public function commentList();

    public function commentUpdate(int $id, string $value);

    public function commentDelete(int $id);
}
