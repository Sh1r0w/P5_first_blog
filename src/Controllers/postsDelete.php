<?php

namespace Controllers;

/* The `Class postsDelete` is a PHP class that is responsible for deleting a post from the database. It
has a method called `postsDelete` which takes an integer parameter ``. Inside the method, it
checks if the `` is set and then prepares and executes a SQL query to delete the post with the
given `` from the `ae_post` table. After the deletion, it redirects the user to the `posts` page.
If the `` is not set, it redirects the user to the `404` page. */
Class postsDelete
{

    public function postsDelete(int $id)
{
    echo 'delete';
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