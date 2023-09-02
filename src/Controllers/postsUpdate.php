<?php

namespace Controllers;

class postsUpdate
{
    protected $upTitle = null;
    protected $upContent = null;
    protected $upChapo = null;
    protected $upAuthor = null;
    public function postsUpdate(array $input, int $id)
    {
        $upTitle = $input['upTitle'];
        $upContent = $input['upContent'];
        $upChapo = $input['upChapo'];
        $upAuthor = $input['upAuthor'];

        $fact = \Controllers\Fonction\factory::getInstance();
        $fact->instance('Controllers\Repository', 'postsRepo')->postsUpdate($id, $upTitle, $upContent, $upChapo, $upAuthor);
        header('location: posts');
    }
}
