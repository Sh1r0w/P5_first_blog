<?php

namespace Controllers\Interface;

/* The code is defining an interface called `postsInterface` within the `Controllers\Interface`
namespace. */
interface postsInterface
{

public function __construct();

public function postsRead($id);

public function postsList();

public function postsSend($title, $chapo ,$content, $author, $img);

public function postsDelete($id);

public function postsUpdate($id, $upTitle, $upContent, $upChapo, $upAuthor);

}