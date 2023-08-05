<?php

namespace Controllers;

Class postsDelete
{

    public function __construct(int $id)
{
    if (isset($id)) {
        $statement = \Controllers\Fonction\db::connectDatabase()->prepare(
            "DELETE FROM ae_post WHERE id = $id"
        );

        $statement->execute();
        
        header('location: posts');
    } else {
        header('location: 404');
    }
}
}