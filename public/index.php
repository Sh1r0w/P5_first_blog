<?php

require '../vendor/autoload.php';
//require_once '../src/controllers/home.php';



// Access to database
require('../src/controllers/db.php');

// Routing
$router = new AltoRouter();


$router->map('GET', '/', 'home', 'homepage');
$router->map('GET|POST', '/posts', 'posts', 'posts');
$router->map('GET|POST', '/comments', 'comments', 'comments');

$match = $router->match();

if (is_array($match)) {

        require '../views/' . $match['target'] . '.twig';

} else {

    require "../views/404.twig";
}
