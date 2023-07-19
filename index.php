<?php

require_once 'vendor/autoload.php';


// Access to database
require('src/controllers/db.php');


// Routing

$page = 'home';
if (isset($_GET['p'])) {
    $page = $_GET['p'];
}


// template

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/templates');

$twig = new \Twig\Environment($loader, [

    'cache' => false //__DIR__ . '/tmp'

]);

if ($page === 'home') {
echo $twig->render('home.twig');
}