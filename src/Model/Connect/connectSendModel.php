<?php

namespace Model\Connect;

/* The connectSend class in PHP retrieves user information from a database based on the provided email. */
class ConnectSendModel
{
    private $data = array();


/**
 * The above function is a magic method in PHP that allows you to set a value to a property in an
 * object.
 *
 * @param name The name parameter is the name of the property that is being set.
 * @param value The value parameter is the value that you want to set for the given property name.
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

    /**
     * The getUser function retrieves user data from a repository and sets session variables if the
     * session flag is set to 1.
     *
     * @param \Controllers\Fonction\Factory fact The parameter `` is an instance of the `Factory`
     * class from the `Controllers\Fonction` namespace. It is used to create instances of different
     * classes dynamically.
     *
     * @return the variable .
     */
    public function getUser(\Controllers\Fonction\Factory $fact): array
    {
        $csrf_token = bin2hex(random_bytes(32));

        $list = $fact->instance(
            'Controllers\Repository',
            'ConnectRepo'
        )->connect(
            $this->data['email']
        )->fetch();

        if ($this->data['session'] == '1') {
            $openSession = $fact->instance('Controllers\Fonction', 'Session');
            $openSession->logged_user = $list[1];
            $openSession->idCo = $list[0];
            $openSession->idUs = $list['id'];
            $openSession->firstname = $list['firstname'];
            $openSession->lastname = $list['lastname'];
            $openSession->img = $list[6];
            $openSession->citation = $list['citation'];
            $openSession->admin = $list['globalAdmin'];
            $openSession->pdf = $list['cv'];
            $openSession->flash = null;
            $openSession->csrf_token = $csrf_token;
        }

        return $list;
    }
}
