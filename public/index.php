<?php

require_once '../vendor/autoload.php';


// Access to database
//require '../src/controllers/db.php';
require_once '../src/controllers/add_posts.php';
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

$match = $router->match();

if (is_array($match)) {

    if(isset($_GET['action']) && $_GET['action'] !== '') {
        if($_GET['action'] === 'sendPost') {
            
                sendPost($_POST);
             
            
        } else {
            echo 'ERREUR' . implode($_POST);
        }
    } else {

        echo $twig->render($match['target'] . '.twig', [$match['target'] => getPost()]);

    }



} else {

    require "../views/404.twig";
}

// Add New Post

