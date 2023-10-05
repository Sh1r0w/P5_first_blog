<?php

namespace Controllers\Interface;

/* The code is defining an interface called `ConnectInterface`. An interface in PHP is a collection of
method signatures that a class can implement. */
interface ConnectInterface
{
    public function __construct();

    public function create($val1, $va2);

    public function check($input);

    public function count();

    public function connect($input);
}
