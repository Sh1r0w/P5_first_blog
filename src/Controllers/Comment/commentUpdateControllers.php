<?php

namespace Controllers\Comment;

class CommentUpdateControllers
{
    /**
     * The function updates a comment in the database and redirects the user to the post page.
     *
     * @param input The `` parameter is an array that contains the updated content of the
     * comment.
     * @param id The "id" parameter is used to identify the specific comment that needs to be updated.
     * It is typically an integer value that represents the unique identifier of the comment in the
     * database.
     * @param key The "key" parameter is likely used to identify a specific post or comment. It could
     * be an identifier such as a post ID or a comment ID.
     * @param \Controllers\Fonction\Factory fact The `` parameter is an instance of the
     * `\Controllers\Fonction\Factory` class. It is used in the `commentUpdate` method of the
     * `` object.
     * @param \Model\Comment\CommentUpdateModel comment The `` parameter is an instance of the
     * `CommentUpdateModel` class, which is a model class responsible for updating comments in the
     * database.
     */
    public function commentUpdateControllers(
        array $input,
        int $id,
        int $key,
        \Controllers\Fonction\Factory $fact,
        \Model\Comment\CommentUpdateModel $comment
    ): void {

        if (isset($id) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
            $comment->upContent = $input['upContent'];
            $comment->id = $id;
            $comment->commentUpdate($fact);
        }
        header('location: postRead?id=' . $key);
    }
}
