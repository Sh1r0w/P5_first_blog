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
$twig->addGlobal('cookie', $_COOKIE);
$fact = \Controllers\Fonction\factory::getInstance();

$fact->instance('Controllers\Fonction', 'csp');

/** 
 * The code snippet is creating a router using the AltoRouter library. The router is used to map
 * different routes to specific functions or actions. 
 */
$router = new AltoRouter();
$router->map(
    'GET',
    '/',
    function () use ($twig, $fact) {
        echo $twig->render('home.twig', ['post' => $fact->postList('postList'), 'count' => $fact->commentCount()->count]);
    },
    'homepage'
);

if (isset($_SESSION['logged_user'], $_COOKIE['BLOG_COOKIE'])) {
    $router->map(
        'GET|POST',
        '/user',
        function () use ($twig) {
            echo $twig->render('user/user.twig');
        },
        'user'
    );
    if (isset($_SESSION['idUs']) != null) {
        $router->map(
            'GET|POST', '/post', function () use ($twig, $fact) {
                echo $twig->render('post/post.twig', ['post' => $fact->postList('postList'), 'count' => $fact->commentCount()->count]);
            }, 'postList'
        );
        $router->map(
            'GET|POST', '/postRead', function () use ($twig, $fact) {
                echo $twig->render('post/postRead.twig', ['postRead' => $fact->postRead($_GET['id']), 'commentsRead' => $fact->commentRead($_GET['id'])]);
            }, 'postRead'
        );
        $router->map(
            'GET|POST', '/profil', function () use ($twig, $fact) {
                echo $twig->render('user/profil.twig', ['user' => $fact->getProfil($_GET['id'])]);
            }, 'profil'
        );
        if (isset($_SESSION['admin']) == '1') {
            $router->map(
                'GET|POST', '/admin', function () use ($twig) {
                    echo $twig->render('admin/admin.twig');
                }, 'admin'
            );
            $router->map(
                'GET|POST', '/userList', function () use ($twig, $fact) {
                    echo $twig->render('admin/userListAdmin.twig', ['userList' => $fact->adminList()]);
                }, 'userList'
            );
            $router->map(
                'GET|POST', '/postListValid', function () use ($twig, $fact) {
                    echo $twig->render('admin/postListValid.twig', ['adminPostList' => $fact->adminPostList()]);
                }, 'postListValid'
            );
            $router->map(
                'GET|POST', '/commentListValid', function () use ($twig, $fact) {
                    echo $twig->render('admin/commentListValid.twig', ['adminCommentList' => $fact->adminCommentList()->comments]);
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
$a = new \Controllers\Fonction\action($_POST);
