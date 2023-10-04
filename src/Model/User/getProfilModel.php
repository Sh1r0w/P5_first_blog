<?php

namespace Model\User;

class GetProfilModel
{
    /**
     * The function `getUser` retrieves a user's profile using a factory to create an instance of the
     * `ProfilRepo` class from the `Controllers\Repository` namespace.
     *
     * @param id The "id" parameter is the identifier of the user that you want to retrieve from the
     * repository. It is used to specify which user's information should be fetched.
     * @param \Controllers\Fonction\Factory fact The parameter `` is an instance of the `Factory`
     * class from the `Controllers\Fonction` namespace. It is used to create instances of different
     * classes.
     *
     * @return the result of calling the `get()` method on an instance of the `ProfilRepo` class, which
     * is obtained from the `Factory` instance ``.
     */
    public function getUser(int $id, \Controllers\Fonction\Factory $fact): object
    {

        return $fact->instance(
            'Controllers\Repository',
            'ProfilRepo'
        )->get($id);
    }
}
