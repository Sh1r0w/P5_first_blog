<?php

namespace Model\Connect;

/* The connectCheck class checks if a given email exists in the ae_connect table and returns true if it
does, false otherwise. */
class connectCheckModel
{
    protected $result = null;

    public function connectCheck($input, \Controllers\Fonction\factory $fact)
    {

        if (isset($input['email'])) {
            $check = $fact->instance('Controllers\Repository', 'connectRepo')->check($input['email'])->fetch();
            if (isset($check['log']) == $input['email']) {
                $this->result = true;
            } else {
                $this->result = false;
            }
            return $this->result;
        };
    }
}
