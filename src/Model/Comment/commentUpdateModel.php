<?php

namespace Model\Comment;

class CommentUpdateModel
{
    private $upContent = null;
    private $id = null;

    /**
     * The commentUpdate function updates a comment in the CommentRepo repository using the provided id
     * and updated content.
     *
     * @param \Controllers\Fonction\Factory fact The parameter `` is an instance of the `Factory`
     * class from the `Controllers\Fonction` namespace.
     */
    public function commentUpdate(\Controllers\Fonction\Factory $fact): void
    {
        echo $this->id, $this->upContent;
        $fact->instance(
            'Controllers\Repository',
            'CommentRepo'
        )->update(
            $this->id,
            $this->upContent
        );
    }

    /**
     * The above function is a magic method in PHP that allows you to dynamically set a property value.
     *
     * @param name The name of the property being set.
     * @param value The value parameter is the value that you want to assign to the property.
     */
    public function __set(string $name, mixed $value): void
    {
        $this->$name = $value;
    }

    /**
     * The above function is a magic method in PHP that allows accessing object properties using the
     * __get() method.
     *
     * @param name The parameter "name" is the name of the property that is being accessed.
     *
     * @return The value of the property with the name specified by the parameter  is being
     * returned.
     */
    public function __get(string $name): mixed
    {
        return $this->$name;
    }

    /**
     * The __isset function in PHP checks if a property exists in an object.
     *
     * @param name The parameter "name" is the name of the property that is being checked for
     * existence.
     *
     * @return the result of the `isset()` function called on the property `` of the current
     * object.
     */
    public function __isset(string $name): bool
    {
        return isset($this->$name);
    }
}
