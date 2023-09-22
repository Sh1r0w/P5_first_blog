<?php

namespace Model\User;

class userPushModel

{
    private $count = 0;

    public function userPush(\Controllers\Fonction\factory $fact)
    {

        if ($_SESSION['idUs'] == null) {
            $statement = $fact->instance('\Controllers\Repository', 'userRepo')->userCreate($_SESSION['idCo']);
            $statement->execute([$this->firstname, $this->lastname, $this->img, $this->citation, $_SESSION['idCo'], $this->count, $this->pdf]);
        } else {
            $statement = $fact->instance('\Controllers\Repository', 'userRepo')->userUpdate($_SESSION['idCo']);
            $statement->execute([$this->firstname, $this->lastname, $this->img, $this->citation, $this->pdf]);
        }
        self::openSession($fact);
    }

    public function openSession($fact)
    {
        $openSession = $fact->instance('Controllers\Fonction', 'session');
        $list = $fact->instance('\Controllers\Repository', 'userRepo')->userRead($_SESSION['idCo']);

        $openSession->firstname = $list['firstname'];
        $openSession->lastname = $list['lastname'];
        $openSession->citation = $list['citation'];
        $openSession->idUs = $list['id'];
        $openSession->admin = $list['globalAdmin'];
        $openSession->pdf = $list['cv'];
        if ($this->img != null) {
            unlink($openSession->img);
            $openSession->img = $this->img;
        }
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __isset($name)
    {
        return isset($this->$name);
    }
}
