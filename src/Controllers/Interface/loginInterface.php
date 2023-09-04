<?php

namespace Controllers\Interface;

interface loginInterface
{
    public function __construct();
    
    public function create($val1, $va2);

    public function check($input);

    public function count();

    public function connect($input);
    
}