<?php

namespace Controllers\Admin;


class adminCommentListControllers
{
    public $list;

    public function commentList($data)
    {
        if(isset($data)){
            $this->list = $data;
        }
        return $this->list;
    }

}