<?php

namespace Model\Posts;

/* The postsUpdateModel class is used to update a post's title, content, chapo, and author in a PHP
application. */

class postsUpdateModel
{
    protected $upTitle = null;
    protected $upContent = null;
    protected $upChapo = null;
    protected $upAuthor = null;

    public function postsUpdate(array $input, $id, $fact)
    {

        $upTitle = $input['upTitle'];
        $upContent = $input['upContent'];
        $upChapo = $input['upChapo'];
        $upAuthor = $input['upAuthor'];

        $fact->instance('Controllers\Repository', 'postsRepo')->postsUpdate($id, $upTitle, $upContent, $upChapo, $upAuthor);
    }
}