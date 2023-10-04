<?php

namespace Model\Admin;

class AdminPostUpdateModel
{
    public $key;

    /**
     * The postUpdate function updates the value of the key property based on the input value of the
     * key parameter.
     *
     * @param key The parameter "key" is a variable that is passed into the function postUpdate(). It
     * is used to determine the value of the property "key" in the current object.
     *
     * @return The value of `->key` after it has been updated.
     */
    public function postUpdate($key): int
    {
        if ($key == "1") {
            return $this->key = "0";
        } else {
            return $this->key = "1";
        }
    }
}
