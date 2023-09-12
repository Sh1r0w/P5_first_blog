<?php

namespace Model\Login;

/* The loginSend class in PHP retrieves user information from a database based on the provided email. */
class loginSendModel

{
    private $list;
    private $session;

    public Function getUser($email, \Controllers\Fonction\factory $fact)
    
    {

        $openSession = $fact->instance('Controllers\Fonction', 'session');
        $list = $fact->instance('Controllers\Repository', 'loginRepo')->connect($email)->fetch();

        if($this->session == '1'){
        $openSession->logged_user = $list[1];    
        $openSession->idCo = $list[0];
        $openSession->idUs = $list['id'];
        $openSession->firstname = $list['firstname'];
        $openSession->lastname = $list['lastname'];
        $openSession->img = $list[6];
        $openSession->citation = $list['citation'];
        $openSession->admin = $list['globalAdmin'];
        $openSession->flash = null;
    }

        return $list;
       
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
        
    }
}