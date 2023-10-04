<?php

namespace Model\Connect;

/* The connectCreate class is used to create a new connect and password entry in a database table. */
class ConnectCreateModel
{
    private $data = array();

/**
 * The function `connectCreate` checks if the email and passwordH data is set, and if so, it uses a
 * factory object to create an instance of the `ConnectRepo` class and calls its `create` method with
 * the email and passwordH data.
 *
 * @param \Controllers\Fonction\Factory fact The parameter `` is an instance of the `Factory`
 * class from the `Controllers\Fonction` namespace. It is used to create instances of different
 * classes.
 *
 * @return bool The method `connectCreate` is returning a boolean value.
 */
    public function connectCreate(\Controllers\Fonction\Factory $fact): ?object
    {

        if (isset($this->data['email'], $this->data['passwordH'])) {
            return $fact->instance(
                'Controllers\Repository',
                'ConnectRepo'
            )->create(
                $this->data['email'],
                $this->data['passwordH']
            );
        }
        return null;
    }

    /**
     * The above function sets a value for a given property in the data array.
     *
     * @param name The name parameter is the name of the property that is being set.
     * @param value The value parameter is the value that you want to set for the specified property.
     */
    public function __set(string $name, mixed $value): void
    {
        $this->data[$name] = $value;
    }

    /**
     * The above function is a magic method in PHP that allows accessing object properties using the
     * syntax ->property.
     *
     * @param name The parameter "name" is the name of the property that is being accessed.
     *
     * @return The value of the property with the name specified by the  parameter.
     */
    public function __get(string $name): mixed
    {
        return $this->data[$name];
    }

    /**
     * The __isset function checks if a specific property exists in the data array.
     *
     * @param name The parameter "name" is the name of the property being checked for existence.
     *
     * @return whether the given property name exists in the `` array.
     */
    public function __isset(string $name): bool
    {
        return isset($this->data[$name]);
    }
}
