<?php

namespace Controllers\Interface;

interface postsInterface
{

public function postsRead($id);

public function postsList();

public function postsSend($title, $chapo ,$content, $author, $img);

public function postsDelete($id);

public function postsUpdate($id, $upTitle, $upContent, $upChapo, $upAuthor);

}