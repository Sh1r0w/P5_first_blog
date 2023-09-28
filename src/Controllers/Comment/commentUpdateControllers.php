<?php

namespace Controllers\Comment;

class commentUpdateControllers
{

    public function commentUpdateControllers(array $input, $id, $key, \Controllers\Fonction\factory $fact, \Model\Comment\commentUpdateModel $updateComment)
    {

        if(isset($input, $id) && $_POST['csrf_token'] === $_SESSION['csrf_token']){
        $updateComment->upContent = $input['upContent'];
        $updateComment->id = $id;
        $updateComment->commentUpdate($fact);
        }
        header('location: postRead?id=' . $key);
    }

}