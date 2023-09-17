<?php

namespace Controllers\User;

class updatePassControllers
{
    public function updatePass($input,\Controllers\Fonction\factory $fact, \Model\User\updatePassModel $updatePassModel)
    {   
        
        $user = $fact->instance('Controllers\Repository', 'connectRepo')->connect($_SESSION['logged_user'])->fetch();
        if(password_verify($input['password'], $user['pwd'])){
        $updatePassModel->update = $input['newPassword'];
        $updatePassModel->updateVerif = $input['newPasswordVerif'];
        $updatePassModel->updatePass();
            if($updatePassModel->valide == 1){
                $fact->instance('Controllers\Repository', 'userRepo')->userPasswordUpdate(password_hash($input['newPassword'], PASSWORD_DEFAULT), $_SESSION['idCo']);
                header('location: user');
            }
    }

    }
}