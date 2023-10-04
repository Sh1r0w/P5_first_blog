<?php

namespace Model\Post;

class PostReadModel
{
    public $read;

    /**
     * The function `postReadModel` retrieves a post from a repository and returns an array of post
     * data.
     *
     * @param id The "id" parameter is the identifier of the post that you want to retrieve from the
     * database. It is used to specify which post you want to read.
     * @param \Controllers\Fonction\Factory fact The parameter `` is an instance of the `Factory`
     * class from the `Controllers\Fonction` namespace. It is used to create instances of different
     * classes dynamically.
     *
     * @return an array of posts. Each post is represented by an associative array with keys 'id',
     * 'title', 'chapo', 'content', 'author', 'addDate', 'updDate', 'imgP', and 'idUs'.
     */
    public function postReadModel(int $id, \Controllers\Fonction\Factory $fact)
    {
        $read = $fact->instance(
            'Controllers\Repository',
            'PostRepo'
        )->postRead($id);

        while ($row = $read->fetch()) {
            $post = [
            'id' => $row['id'],
            'title' => $row['title'],
            'chapo' => $row['chapo'],
            'content' => $row['content'],
            'author' => $row['author'],
            'addDate' => $row['addDate'],
            'updDate' => $row['updDate'],
            'imgP' => $row['picture'],
            'idUs' => $row['id_user'],
            ];
            $this->read[] = $post;
        }
        return $this->read;
    }
}
