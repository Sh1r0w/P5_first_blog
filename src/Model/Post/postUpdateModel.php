<?php

namespace Model\Post;

class PostUpdateModel
{
    protected $upTitle = null;
    protected $upContent = null;
    protected $upChapo = null;
    protected $upAuthor = null;
    protected $imgPost;

    /**
     * The function postUpdate updates a post in a repository with new input values and an optional new
     * image.
     *
     * @param array input An array containing the updated values for the post's title, content, chapo,
     * and author.
     * @param id The "id" parameter is the identifier of the post that needs to be updated. It is used
     * to retrieve the specific post from the database and update its information.
     * @param fact The "fact" parameter is an instance of a class that is used to access other classes
     * or objects. It is used to create instances of the "Controllers\Fonction" and
     * "Controllers\Repository" classes and call their methods.
     */
    public function postUpdate(array $input, int $id, \Controllers\Fonction\Factory $fact): void
    {
        $img = $fact->instance('Controllers\Fonction', 'GetImg')->getImg();
        $list = $fact->instance('Controllers\Repository', 'PostRepo')->postRead($id)->fetch();
        $this->imgPost = $list['picture'];

        if (isset($img) !== null) {
                    unlink($this->imgPost);
                $this->imgPost = $img;
        }

        $upTitle = $input['upTitle'];
        $upContent = $input['upContent'];
        $upChapo = $input['upChapo'];
        $upAuthor = $input['upAuthor'];

        $fact->instance(
            'Controllers\Repository',
            'PostRepo'
        )->postUpdate(
            $id,
            $upTitle,
            $upContent,
            $upChapo,
            $upAuthor,
            $this->imgPost
        );
    }
}
