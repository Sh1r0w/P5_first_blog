<?php

namespace Fonction;

/* The code is using the Dotenv library to load environment variables from a .env file. */
$dotenv = \Dotenv\Dotenv::createMutable(__DIR__);
$dotenv->safeLoad();
