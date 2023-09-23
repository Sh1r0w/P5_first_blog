<?php

namespace Controllers\Interface;

/* The code is defining an interface called `postInterface` within the `Controllers\Interface`
namespace. */
interface postInterface
{

public function __construct();

public function postRead($id);

public function postList();

public function postSend($title, $chapo ,$content, $author, $img);

public function postDelete($id);

public function postUpdate($id, $upTitle, $upContent, $upChapo, $upAuthor, $upImg);

}