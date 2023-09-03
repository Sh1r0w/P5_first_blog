<?php

namespace Controllers\Interface;

interface adminInterface
{
    public function __construct();

    public function userList();

    public function userUpdate($id, $value);

    public function userDelete($id);

    public function postsList();

    public function postsUpdate($id, $value);

    public function postsDelete($id);

    public function commentList();

    public function commentUpdate($id, $value);

    public function commentDelete($id);
}