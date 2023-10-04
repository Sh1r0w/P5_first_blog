<?php

namespace Controllers\Template;

/* The `interface CommentInterface` is defining a contract for classes that implement it. It specifies
a set of methods that must be implemented by any class that wants to be considered a comment
controller. The methods defined in the interface include `__construct()`, `create()`, `read()`,
`delete()`, `update()`, and `count()`. */

interface CommentInterface
{
    public function __construct();

    public function create(string $content, int $idpost);

    public function read(int $id);

    public function delete(int $id);

    public function update(int $id, string $content);

    public function count();
}
