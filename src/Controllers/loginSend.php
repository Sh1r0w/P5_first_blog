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

        if(isset($email) && isset($password)){
            $statement = \Controllers\Fonction\db::connectDatabase()->query(
                "SELECT pwd, id FROM ae_connect WHERE log = '$email'"
            );

            while (($result = $statement->fetch())){
            $return = [
                'pwd' => $result['pwd'],
                'id' => $result['id'],
            ];

        }
        if(password_verify($password, $return['pwd'])){     
            $_SESSION['logged_user'] = $email;
            $_SESSION['id'] = $return['id'];
            header('location: posts');
            //echo 'OK j ai dis';
        }else{
            echo 'mauvais mot de passe';
        }
        }

    }

}