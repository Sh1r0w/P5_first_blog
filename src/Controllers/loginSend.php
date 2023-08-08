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
            try {
            $statement = \Controllers\Fonction\db::connectDatabase()->query(
                "SELECT * FROM ae_connect a LEFT JOIN ae_user e ON a.id = e.id_login WHERE a.log = '$email'"
            );
        } catch (\Exception $e) {
            exit(($e->getMessage()));
        }

            while (($result = $statement->fetch(\PDO::FETCH_PROPS_LATE, \PDO::FETCH_CLASS))){
                var_dump($result);
            if(password_verify($password, $result['pwd'])){     
                $_SESSION['logged_user'] = $email;
                $_SESSION['id'] = $result[0];
                $_SESSION['firstname'] = $result['firstname'];
                $_SESSION['lastname'] = $result['lastname'];
                $_SESSION['img'] = $result['pictures'];
                $_SESSION['citation'] = $result['citation'];
                $_SESSION['admin'] = $result['globalAdmin'];
                header('location: /');

            }else{
                echo 'mauvais mot de passe';
            }
        }

        
        }

    }

}