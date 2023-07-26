<?php

require_once '../vendor/autoload.php';


// Required files
require_once '../src/controllers/db.php';
require_once '../src/controllers/posts.php';
require_once '../src/model/posts.php';



// Twig

$loader = new \Twig\Loader\FilesystemLoader('../views/');

$twig = new \Twig\Environment($loader, [
    'cache' => false,
]);

// Routing
$router = new AltoRouter();


$router->map('GET', '/', 'home', 'homepage');
$router->map('GET|POST', '/posts', 'posts', 'sendPost');
$router->map('GET|POST', '/comments', 'comments', 'comments');
$router->map('GET|POST', '/login', 'login');
$match = $router->match();

if (is_array($match)) {

// Root for send / update / delete page

    if (isset($_GET['action']) && $_GET['action'] !== '') {
        if ($_GET['action'] === ($match['target'] . 'Send')) {

            ($match['target'] . 'Send')($_POST);

        } elseif ($_GET['action'] === ($match['target'] . 'Update')) {
            // Soon
  
            
        } elseif ($_GET['id'] > 0 && $_GET['action'] === ($match['target'] . 'Delete')) {
            // Soon
            ($match['target'] . 'Delete')($_GET['id']);
        } else {
            echo 'ERREUR';
        }
    } elseif($match['target'] == 'posts' || $match['target'] == 'comment') {

        echo $twig->render($match['target'] . '.twig', [$match['target'] => ($match['target'] . 'List')()]);

    } else {
        echo $twig->render($match['target'] . '.twig');
    }
} else {

    require "../views/404.twig";
}

