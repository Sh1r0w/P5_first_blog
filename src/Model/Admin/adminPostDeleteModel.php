<?php

namespace Model\Admin;

class AdminPostDeleteModel
{
    public $value = false;
    /**
     * The function postDelete checks if the variable  is set and returns a boolean value based on
     * its existence.
     *
     * @param id The parameter "id" is used to specify the identifier of the item that needs to be
     * deleted.
     *
     * @return The value of the variable ->value is being returned.
     */
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
