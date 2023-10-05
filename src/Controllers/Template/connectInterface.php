<?php

namespace Controllers\Template;

/* The code is defining an interface called `ConnectInterface`. An interface in PHP is a collection of
method signatures that a class can implement. */
interface ConnectInterface
{
    public function __construct();

    public function create(string $connect, string $password): void;

    public function check(string $input): object;

    public function count(): object;

    public function connect(string $input): object;
}
