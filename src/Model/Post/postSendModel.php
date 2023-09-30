<?php

namespace Model\Post;

class PostSendModel
{
    /**
     * The function `postSend` sends a post with the given title, chapo, content, author, and image to
     * the PostRepo repository.
     *
     * @param title The title of the post.
     * @param chapo The "chapo" parameter is likely a short summary or introduction of the post
     * content.
     * @param content The "content" parameter is the main body of the post, which typically contains
     * the text or information that you want to share in your post.
     * @param author The "author" parameter is the name or identifier of the person who is creating or
     * submitting the post.
     * @param img The "img" parameter is used to pass the image associated with the post. It could be
     * the URL or file path of the image.
     * @param fact The "fact" parameter is an instance of a class that is used to perform some kind of
     * action or operation. In this case, it is being used to call a method named "postSend" on an
     * instance of the "PostRepo" class.
     */
    public function postSend($title, $chapo, $content, $author, $img, $fact)
    {
        $fact->instance(
            'Controllers\Repository',
            'PostRepo'
        )->postSend(
            $title,
            $chapo,
            $content,
            $author,
            $img
        );
    }
}
