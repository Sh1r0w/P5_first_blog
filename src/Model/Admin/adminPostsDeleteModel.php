<?php

namespace Model\Admin;

class adminPostsDeleteModel
{
    public $value = false;
    public function postsDelete($id)
    {
        if (isset($id)) {
            $this->value = true;
            return $this->value;
        } else {
            return $this->value;
        };
    }
}
