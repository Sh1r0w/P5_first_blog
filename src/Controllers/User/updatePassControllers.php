<?php

namespace Controllers\User;

class UpdatePassControllers
{
    /**
     * The function updates the user's password if the input password matches the current password and
     * the CSRF token is valid.
     *
     * @param input The  parameter is an array that contains the user's input for updating their
     * password. It should have the following keys:
     * @param \Controllers\Fonction\Factory fact The `` parameter is an instance of the
     * `\Controllers\Fonction\Factory` class. It is used to create instances of different classes
     * within the application.
     * @param \Model\User\UpdatePassModel updatePassModel The  parameter is an instance
     * of the \Model\User\UpdatePassModel class. It is used to update the user's password in the
     * database.
     */
    public function updatePass(
        $input,
        \Controllers\Fonction\Factory $fact,
        \Model\User\UpdatePassModel $updatePassModel
    ) {

        $user = $fact->instance(
            'Controllers\Repository',
            'ConnectRepo'
        )->connect(
            $_SESSION['logged_user']
        )->fetch();

        if (password_verify($input['password'], $user['pwd']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
            $updatePassModel->update = $input['newPassword'];
            $updatePassModel->updateVerif = $input['newPasswordVerif'];
            $updatePassModel->updatePass();
            if ($updatePassModel->valide == 1) {
                $fact->instance(
                    'Controllers\Repository',
                    'UserRepo'
                )->userPasswordUpdate(
                    password_hash(
                        $input['newPassword'],
                        PASSWORD_DEFAULT
                    ),
                    $_SESSION['idCo']
                );
                header('location: user');
            }
        }
    }
}
