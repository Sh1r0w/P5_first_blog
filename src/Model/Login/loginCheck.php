<?php

namespace Model\Login;

/* The loginCheck class checks if a given email exists in the ae_connect table and returns true if it
does, false otherwise. */
class loginCheck
{
    protected $result = null;

    public function loginCheck($input)
    {
        
        if (isset($input['email'])) {
            $statement = \Controllers\Fonction\db::connectDatabase()->prepare(
                "SELECT log FROM ae_connect WHERE log = ?"
            );
            $statement->execute([$input['email']]);
            $check = $statement->fetch();
            var_dump($check);
            die;
            if(isset($check['log']) == $$input['email']){
               $this->result = true;
            }else{
                $this->result = false;
            }
            return $this->result;
        };
    }
}
