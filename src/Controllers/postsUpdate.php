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
    public function __construct(int $id, array $input)
    {
        $upTitle = $input['upTitle'];
        $upContent = $input['upContent'];

        $statement = \Controllers\Fonction\db::connectDatabase()->prepare(
            "UPDATE ae_post SET title = ?, content = ?, updDate = NOW() WHERE id = $id"
        );
        $statement->execute([$upTitle, $upContent]);

        header('location: posts');
    }
}
