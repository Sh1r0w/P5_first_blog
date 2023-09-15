<?php

namespace Model\Admin;

class adminPostDeleteModel
{
    public $value = false;
    public function postDelete($id)
    {
        if (isset($id)) {
            $this->value = true;
            return $this->value;
        } else {
            return $this->value;
        };
    }
}
