<?php

namespace Controllers\Fonction;

require '../src/controllers/fonction/params.php';
require 'classeDb.php';
/* The `class Db` is responsible for creating and connecting to a MySQL database. It creates the
necessary tables if they don't already exist. It also provides a static method `connectDatabase()`
that can be used to establish a connection to the database. */

$dbInstance = Db::connectDatabase();
