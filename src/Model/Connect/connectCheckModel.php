<?php

namespace Model\Connect;

class ConnectCheckModel
{
    protected $result = null;

    /**
     * The function checks if the given email exists in the ConnectRepo repository and returns true if
     * it does, false otherwise.
     *
     * @param input An array containing the input data. It is expected to have an 'email' key.
     * @param \Controllers\Fonction\Factory fact The parameter `` is an instance of the `Factory`
     * class from the `Controllers\Fonction` namespace.
     *
     * @return the value of the variable ->result.
     */
    public function connectCheck(array $input, \Controllers\Fonction\Factory $fact): bool
    {

        if (isset($input['email'])) {
            $check = $fact->instance(
                'Controllers\Repository',
                'ConnectRepo'
            )->check(
                $input['email']
            )->fetch();

            if (isset($check['log']) == $input['email']) {
                $this->result = true;
            } else {
                $this->result = false;
            }
        };
        return $this->result;
    }
}
