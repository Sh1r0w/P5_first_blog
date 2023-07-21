<?php

require '../vendor/autoload.php';
require_once '../src/controllers/home.php';



// Access to database
require('../src/controllers/db.php');


// Routing
$router = new AltoRouter();

// Homepage Routing
$router->map('GET', '/', function(){
    require '../views/home.twig';
});

// Post and comment Routing

$router->map('GET|POST', '/[a:page]/[i:id]', function($page, $id) {
    if ($page === 'posts') {
        require '../views/{$page}.twig';
    } elseif ($page === 'comment'){
        require '../views/{$page}.twig';
    }
    
    else {
        require "../views/404.twig";
        Echo 'Error 404 page /' . $page . '/' . $id . ' not found';
        
    }
});


// Check if the router and an array

$match = $router->match();

if (is_array($match) && is_callable($match['target'])) {

        call_user_func_array($match['target'], $match['params']);
        
    
} else {

    require "../views/404.twig";
    
}
