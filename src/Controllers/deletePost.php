<?php

Class deletePost extends ListPost
{

    public function deletePost(int $id)
{
    if (isset($id)) {
        $statement = DbConnect::connectDatabase()->prepare(
            "DELETE FROM ae_post WHERE id = $id"
        );

        $statement->execute();
        
        header('location: posts');
    } else {
        header('location: 404');
        echo $id;
    }
}
}