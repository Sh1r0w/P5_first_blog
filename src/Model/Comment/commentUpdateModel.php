<?php

namespace Model\Comment;

class commentUpdateModel
{
    private $upContent = null;
    private $id = null;

    public function commentUpdate(\Controllers\Fonction\factory $fact)
    {
        echo $this->id, $this->upContent;
        $fact->instance('Controllers\Repository', 'commentRepo')->update($this->id, $this->upContent);
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
