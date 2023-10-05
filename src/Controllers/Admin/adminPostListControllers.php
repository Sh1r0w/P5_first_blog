<?php

namespace Controllers\Admin;

/* The AdminPostListControllers class is used to manage and display a list of post. */
class AdminPostListControllers
{
    public $list;

    public function postList(object $data): array
    {

            $this->list[] = $data;

        return $this->list;
    }
}
