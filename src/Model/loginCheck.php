<?php

namespace Model;

class loginCheck
{
    protected $result = null;

    public function loginCheck($email): bool
    {
        
        if (isset($email)) {
            $statement = \Controllers\Fonction\db::connectDatabase()->prepare(
                "SELECT log FROM ae_connect WHERE log = ?"
            );
            $statement->execute([$email]);
            $check = $statement->fetch();
            if(isset($check['log']) == $email){
               $this->result = true;
            }else{
                $this->result = false;
            }
            return $this->result;
        };
    }
}
