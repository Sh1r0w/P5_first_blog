<?php

namespace Controllers\Interface;

/* The `interface commentInterface` is defining a contract for classes that implement it. It specifies
a set of methods that must be implemented by any class that wants to be considered a comment
controller. The methods defined in the interface include `__construct()`, `create()`, `read()`,
`delete()`, `update()`, and `count()`. */

interface commentInterface

{
    public function __construct();
    
    public function create($content, $idpost);

    public function read($id);

    public function delete($id);

    public function update();

    public function count();
    
}