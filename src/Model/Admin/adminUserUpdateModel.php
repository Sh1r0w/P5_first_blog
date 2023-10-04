<?php

namespace Model\Admin;

class AdminUserUpdateModel
{
    public $key;
    /**
     * The adminUpdate function updates the value of the key property based on the input key value.
     *
     * @param key The parameter "key" is a variable that is passed into the function "adminUpdate". It
     * is used to determine the value of the property "key" of the object that the function is called
     * on. If the value of "key" is '1', then the function will set the value of
     *
     * @return The value of `->key` after it has been updated.
     */
    public function adminUpdate($key): string
    {
        if ($key == '1') {
            return $this->key = '0';
        } else {
            return $this->key = '1';
        }
    }
}
