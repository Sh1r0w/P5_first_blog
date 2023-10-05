<?php

namespace Controllers\Interface;

/* The code is defining an interface called `PostInterface` within the `Controllers\Interface`
namespace. */
interface PostInterface
{
    public function __construct();

    public function postRead($id);

    public function postList();

    public function postSend($title, $chapo, $content, $author, $img);

    public function postDelete($id);

    public function postUpdate($id, $upTitle, $upContent, $upChapo, $upAuthor, $upImg);
}
