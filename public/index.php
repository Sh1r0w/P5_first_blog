<?php

require_once '../vendor/autoload.php';



// Required files
require_once '../src/Controllers/Fonction/Autoloader.php';

\Controllers\Fonction\Autoloader::register();

// Routing
$router = new AltoRouter();


$router->map('GET', '/', 'home', 'homepage');
$router->map('GET|POST', '/posts', 'posts', 'postsList');
$router->map('GET|POST', '/comments', 'comments', 'comments');
$router->map('GET|POST', '/login', 'login');
$match = $router->match();

$r = new \Controllers\Fonction\root($match);
