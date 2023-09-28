<?php

namespace Controllers\Interface;

/* The code is defining an interface called `adminInterface`. An interface in PHP is a collection of
method signatures that a class can implement. */
interface adminInterface
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
