<?php

namespace Model\User;

class UpdatePassModel
{
    private $valide = '0';
    private $update = null;
    private $updateVerif = null;

    /**
     * The function "updatePass" checks if the "update" and "updateVerif" variables are equal and
     * returns "1" if they are.
     *
     * @return the value '1' if the condition `->update == ->updateVerif` is true.
     */
    public function updatePass(): string
    {
        if ($this->update == $this->updateVerif) {
             $this->valide = '1';
        }
        return $this->valide;
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
     * @return The value of the property with the name specified by the parameter .
     */
    public function __get(string $name): string
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
