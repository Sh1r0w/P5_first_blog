<?php

namespace Controllers\Fonction;

/* The code is including two PHP files, `params.php` and `classe.php`, and then creating an instance of
the `Factory` class using the `getInstance()` method. */

require '../src/controllers/fonction/params.php';
require 'classe.php';

$factoryInstance = Factory::getInstance();
