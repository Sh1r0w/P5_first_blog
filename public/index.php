<?php
session_start();
require_once '../vendor/autoload.php';

/**
 * Load Autoloader for add require path
 */
require_once '../src/Controllers/Fonction/Autoloader.php';
\Controllers\Fonction\Autoloader::register();

/** 
 *  This code snippet is setting up the Twig templating engine for the PHP application. 
 */
$loader = new \Twig\Loader\FilesystemLoader('../views/');
$twig = new \Twig\Environment(
    $loader, [
    'cache' => false,
    'debug' => true,
    ]
);
$twig->addExtension(new \Twig\Extension\DebugExtension());
$twig->addGlobal('session', $_SESSION);
$fact = \Controllers\Fonction\factory::getInstance();

/** 
 * The code snippet is creating a router using the AltoRouter library. The router is used to map
 * different routes to specific functions or actions. 
 */
$router = new AltoRouter();
$router->map(
    'GET',
    '/',
    function () use ($twig, $fact) {
        echo $twig->render('home.twig', ['posts' => $fact->postsList('postsList'), 'count' => $fact->commentCount()->count]);
    },
    'homepage'
);
if (isset($_SESSION['logged_user'])) {
    $router->map(
        'GET|POST',
        '/user',
        function () use ($twig) {
            echo $twig->render('user.twig');
        },
        'user'
    );
    if (isset($_SESSION['idUs']) != null) {
        $router->map(
            'GET|POST', '/posts', function () use ($twig, $fact) {
                echo $twig->render('posts.twig', ['posts' => $fact->postsList('postsList'), 'count' => $fact->commentCount()->count]);
            }, 'postsList'
        );
        $router->map(
            'GET|POST', '/postsRead', function () use ($twig, $fact) {
                echo $twig->render('postsRead.twig', ['postsRead' => $fact->postsRead($_GET['id']), 'commentsRead' => $fact->commentRead($_GET['id'])]);
            }, 'postsRead'
        );
        $router->map(
            'GET|POST', '/profil', function () use ($twig, $fact) {
                echo $twig->render('profil.twig', ['user' => $fact->getProfil($_GET['id'])]);
            }, 'profil'
        );
        if (isset($_SESSION['admin']) == '1') {
            $router->map(
                'GET|POST', '/admin', function () use ($twig) {
                    echo $twig->render('admin.twig');
                }, 'admin'
            );
            $router->map(
                'GET|POST', '/userList', function () use ($twig, $fact) {
                    echo $twig->render('userListAdmin.twig', ['userList' => $fact->adminList()]);
                }, 'userList'
            );
            $router->map(
                'GET|POST', '/postsListValid', function () use ($twig, $fact) {
                    echo $twig->render('postsListValid.twig', ['adminPostsList' => $fact->adminPostsList()]);
                }, 'postsListValid'
            );
            $router->map(
                'GET|POST', '/commentListValid', function () use ($twig, $fact) {
                    echo $twig->render('commentListValid.twig', ['adminCommentList' => $fact->adminCommentList()->comments]);
                }, 'commentListValid'
            );
        };
    }
}
$match = $router->match();
if (is_array($match) && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    //header('location: /');
}

/**
 * Load bdd 
 *
 * @Param action $match altorouter and $_POST
 */
$d = \Controllers\Fonction\db::connectDatabase();
$a = new \Controllers\Fonction\action($match, $_POST);
