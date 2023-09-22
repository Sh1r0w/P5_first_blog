<?php

namespace Controllers\User;

/* The `class userSend` is a PHP class that handles the logic for sending user data. It has a
constructor method `userSend` that takes an array of input data as a parameter. */
class userSendControllers

{
    protected $img = null;
    protected $pdf = null;
    protected $id = null;

    public function userSend(array $input, $count,\Controllers\Fonction\factory $fact, \Model\User\userPushModel $userPush)
    {
        $openSession = $fact->instance('Controllers\Fonction', 'session');

        if (isset($openSession->idCo)) {
           $img = $fact->instance('Controllers\Fonction', 'getImg')->getImg();
           $pdf = $fact->instance('Controllers\Fonction', 'getPdf')->getPdf();

            $userPush->lastname = $input['lastname'];
            $userPush->firstname = $input['firstname'];
            $userPush->citation = $input['citation'];
            $userPush->img = $img;
            $userPush->pdf = $pdf;
            $userPush->count = $count;

            if($count == '0'){
                $userPush->count = '1';
            }else{
                $userPush->count = '0';
            }
            $userPush->userPush($fact);

            header('location: /user');
        } else {
            echo 'nop';
        }


    }
}