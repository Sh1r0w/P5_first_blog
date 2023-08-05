<?php

namespace Controllers;

class loginSend 
{
    private $email = null;
    private $password = null;

    public function __construct(array $input)
    {
        $email = $input['email'];
        $password = $input['password'];

        if(isset($email)&& isset($password)){
            $statement = \Controllers\Fonction\db::connectDatabase()->query(
                "SELECT pwd FROM ae_connect WHERE log = '$email'"
            );

            while (($result = $statement->fetch())){
            $return = [
                'pwd' => $result['pwd'],
            ];

        }
        if(password_verify($password, implode($return))){     
            header('location: posts');
            //echo 'OK j ai dis';
        }else{
            echo 'mauvais mot de passe';
        }
        }

    }

}