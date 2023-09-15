<?php

namespace Model\Connect;

/* The connectSend class in PHP retrieves user information from a database based on the provided email. */
class connectSendModel

{
    private $list;
    private $data = array();


    public function __set($name, $value)
    {
            $this->data[$name] = $value;

    }

    public function __get($name)
    {
        return $this->data[$name];
    }

    public function __isset($name)
    {
        return isset($this->data[$name]);
    }
    
    public Function getUser(\Controllers\Fonction\factory $fact)
    
    {
        
        $list = $fact->instance('Controllers\Repository', 'connectRepo')->connect($this->data['email'])->fetch();
        
        if($this->data['session'] == '1'){
            
        $openSession = $fact->instance('Controllers\Fonction', 'session');
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

    
}