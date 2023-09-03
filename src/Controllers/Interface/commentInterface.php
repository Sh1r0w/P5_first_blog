<?php

namespace Controllers\Interface;

interface commentInterface

{
    public function __construct();
    
    public function create($content, $idpost);

    public function read($id);

    public function delete($id);

    public function update();

    public function count();
    
}