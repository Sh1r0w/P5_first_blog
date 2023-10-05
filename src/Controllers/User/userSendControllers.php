<?php

namespace Controllers\User;

/* The `class userSend` is a PHP class that handles the logic for sending user data. It has a
constructor method `userSend` that takes an array of input data as a parameter. */
class UserSendControllers
{
    protected $img = null;
    protected $pdf = null;
    protected $id = null;
    /**
     * The function `userSend` takes in an array of input, a count, a Factory object, and a
     * UserPushModel object, and performs various operations based on the input before redirecting the
     * user to the /user page.
     *
     * @param array input An array containing the user's input data, such as their lastname, firstname,
     * and citation.
     * @param count The parameter "count" is a variable that determines the value of the "count"
     * property of the  object. It is used to control the behavior of the "userPush" method.
     * If the value of "count" is '0', then the "count" property of
     * @param \Controllers\Fonction\Factory fact The `` parameter is an instance of the `Factory`
     * class from the `Controllers\Fonction` namespace. It is used to create instances of different
     * classes within the `Controllers\Fonction` namespace.
     * @param \Model\User\UserPushModel userPush The `userPush` parameter is an instance of the
     * `UserPushModel` class from the `Model\User` namespace. It is used to store and manipulate user
     * data such as `lastname`, `firstname`, `citation`, `img`, `pdf`, and `count`. The `userPush`
     */
    public function userSend(
        array $input,
        $count,
        \Controllers\Fonction\Factory $fact,
        \Model\User\UserPushModel $userPush
    ) {
        $openSession = $fact->instance('Controllers\Fonction', 'Session');

        if (isset($openSession->idCo) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
            $img = $fact->instance('Controllers\Fonction', 'GetImg')->getImg();
            $pdf = $fact->instance('Controllers\Fonction', 'GetPdf')->getPdf();

            $userPush->lastname = $input['lastname'];
            $userPush->firstname = $input['firstname'];
            $userPush->citation = $input['citation'];
            $userPush->socialFacebook = $input['socialNetworkFacebook'];
            $userPush->socialInstagram = $input['socialNetworkInstagram'];
            $userPush->socialX = $input['socialNetworkX'];
            $userPush->socialLinkedin = $input['socialNetworkLinkedin'];
            $userPush->socialGithub = $input['socialNetworkGithub'];
            $userPush->socialGitlab = $input['socialNetworkGitlab'];
            if (isset($input['deleteImg'])) {
                $userPush->deleteImg = 1;
            } else {
                $userPush->img = $img;
            }

            if (isset($input['deletePdf'])) {
                $userPush->deletePdf = 1;
            } else {
                $userPush->pdf = $pdf;
            }
            $userPush->count = $count;

            if ($count == '1') {
                $userPush->count = '1';
                echo $count;
            } else {
                $userPush->count = '0';
            }

            $userPush->userPush($fact);

            header('location: /user');
        } else {
            echo 'nop';
        }
    }
}
