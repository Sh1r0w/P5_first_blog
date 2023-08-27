<?php

namespace Controllers;

class postsUpdate
{
    /**
     * @param __construct 
     * wait INT $id and 
     * Array $input for edit 
     * one post with id 
     */
    protected $upTitle = null;
    protected $upContent = null;
    protected $upChapo = null;
    protected $upAuthor = null;
    public function __construct(array $input, int $id)
    {
        $upTitle = $input['upTitle'];
        $upContent = $input['upContent'];
        $upChapo = $input['upChapo'];
        $upAuthor = $input['upAuthor'];

        $statement = \Controllers\Fonction\db::connectDatabase()->prepare(
            "UPDATE ae_post SET title = ?, content = ?, chapo = ?, author = ?, updDate = NOW() WHERE id = $id"
        );
        $statement->execute([$upTitle, $upContent, $upChapo, $upAuthor]);

        header('location: posts');
    }
}
