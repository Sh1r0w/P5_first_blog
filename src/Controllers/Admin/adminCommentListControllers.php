<?php

/**
 * The adminCommentListControllers class is a PHP
 * class that manages a list of comments for the admin
 * section of a website.
 */

namespace Controllers\Admin;

class adminCommentListControllers
{
    public $list;

    /**
     * The `public function commentList()` is a method that takes in a parameter `$data` and
     * assigns it to the property `` of the class. It then returns the value of `$list`.
     * */

    public function commentList($data)
    {

        if (isset($data)) {
            $this->list = $data;
        }
        return $this->list;
    }
}
