<?php

namespace Model\Connect;

class ConnectCheckCountModel
{
    public $result;

    /**
     * The function constructs an instance of a repository and returns the count of fetched data.
     *
     * @param \Controllers\Fonction\Factory fact The parameter `` is an instance of the `Factory`
     * class from the `Controllers\Fonction` namespace.
     *
     * @return The value of `->result` is being returned.
     */
    public function __construct(\Controllers\Fonction\Factory $fact)
    {
        $this->result = $fact->instance(
            'Controllers\Repository',
            'ConnectRepo'
        )->count()
            ->fetch()[0];

        return $this->result;
    }
}
