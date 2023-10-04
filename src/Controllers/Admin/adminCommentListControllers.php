<?php

/**
 * The AdminCommentListControllers class is a PHP
 * class that manages a list of comments for the admin
 * section of a website.
 */

namespace Controllers\Admin;

class AdminCommentListControllers
{
    public $list;

    /**
     * The `public function commentList()` is a method that takes in a parameter `$data` and
     * assigns it to the property `` of the class. It then returns the value of `$list`.
     * */

    public function commentList(object $data)
    {

        if (isset($data)) {
            $this->list = $data;
        }
        return $this->list;
    }
}
