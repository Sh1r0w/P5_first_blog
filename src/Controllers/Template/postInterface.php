<?php

namespace Controllers\Template;

/* The code is defining an interface called `PostInterface` within the `Controllers\Template`
namespace. */
interface PostInterface
{
    public function __construct();

    public function postRead(int $id);

    public function postList();

    public function postSend(string $title, string $chapo, string $content, string $author, string $img);

    public function postDelete(int $id);

    public function postUpdate(int $id, string $upTitle, string $upContent, string $upChapo, string $upAuthor, string $upImg);
}
