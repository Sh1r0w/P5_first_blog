<?php

namespace Controllers\Template;

/* The code is defining an interface called `AdminInterface`. An interface in PHP is a collection of
method signatures that a class can implement. */
interface AdminInterface
{
    public function __construct();

    public function userList();

    public function userUpdate($id, $value);

    public function userDelete($id);

    public function postList();

    public function postUpdate($id, $value);

    public function postDelete($id);

    public function commentList();

    public function commentUpdate($id, $value);

    public function commentDelete($id);
}
