<?php

namespace Model\Admin;

class AdminCommentUpdateModel
{
    public $key;

    /**
     * The commentUpdate function updates the value of the key variable based on the input value.
     *
     * @param key The parameter "key" is a variable that is passed into the function commentUpdate().
     * It is used to determine the value of the property "key" of the object that the function is
     * called on. If the value of "key" is "1", then the function will set the value of the
     *
     * @return The value of `->key` is being returned.
     */
    public function commentUpdate($key): int
    {
        if ($key == "1") {
            return $this->key = "0";
        } else {
            return $this->key = "1";
        }
    }
}
