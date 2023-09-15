<?php

namespace Model\Post;

/* The postUpdateModel class is used to update a post's title, content, chapo, and author in a PHP
application. */

class postUpdateModel
{
    protected $upTitle = null;
    protected $upContent = null;
    protected $upChapo = null;
    protected $upAuthor = null;

    public function postUpdate(array $input, $id, $fact)
    {

        $upTitle = $input['upTitle'];
        $upContent = $input['upContent'];
        $upChapo = $input['upChapo'];
        $upAuthor = $input['upAuthor'];

        $fact->instance('Controllers\Repository', 'postRepo')->postUpdate($id, $upTitle, $upContent, $upChapo, $upAuthor);
    }
}