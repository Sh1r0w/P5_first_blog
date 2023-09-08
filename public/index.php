<?php
session_start();
require_once '../vendor/autoload.php';

/**
 * load Autoloader for add require path
 */
require_once '../src/Controllers/Fonction/Autoloader.php';

\Controllers\Fonction\Autoloader::register();

$loader = new \Twig\Loader\FilesystemLoader('../views/');
$twig = new \Twig\Environment($loader, [
    'cache' => false,
    'debug' => true,
]);
$twig->addExtension(new \Twig\Extension\DebugExtension());
$twig->addGlobal('session', $_SESSION);

$fact = \Controllers\Fonction\factory::getInstance();

/**
 * use Altorooter
 */
$router = new AltoRouter();

$router->map(
    'GET',
    '/',
    function () use ($twig, $fact) {
        echo $twig->render('home.twig', ['posts' => $fact->postsList('postsList'), 'count' => $fact->commentCount()]);
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

if(isset($_SESSION['idUs']) != null){
    $router->map('GET|POST', '/posts', function () use ($twig, $fact) {
        echo $twig->render('posts.twig', ['posts' => $fact->postsList('postsList'), 'count' => $fact->commentCount()]);
    }, 'postsList');

    $router->map('GET|POST', '/postsRead', function () use ($twig, $fact) {
        echo $twig->render('postsRead.twig', ['postsRead' => $fact->postsRead($_GET['id']), 'commentsRead' => $fact->commentRead($_GET['id'])]);
    }, 'postsRead');

    if (isset($_SESSION['admin']) == '1') {
        $router->map('GET|POST', '/admin', function () use ($twig) {
            echo $twig->render('admin.twig');
        }, 'admin');
        $router->map('GET|POST', '/userList', function () use ($twig, $fact) {
            echo $twig->render('userListAdmin.twig', ['userList' => $fact->adminList()]);
        }, 'userList');

        $router->map('GET|POST', '/postsListValid', function () use ($twig, $fact) {
            echo $twig->render('postsListValid.twig', ['adminPostsList' => $fact->adminPostsList()]);
        }, 'postsListValid');

        $router->map('GET|POST', '/commentListValid', function () use ($twig, $fact) {
            echo $twig->render('commentListValid.twig', ['adminCommentList' => $fact->adminCommentList()]);
        }, 'commentListValid');
    };
    }
} 

$match = $router->match();

if (is_array($match) && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
}else{
    header('location: /');
}


/**
 * load bdd 
 * @param action $match altorouter and $_POST
 */

$d = new \Controllers\Fonction\db;
$a = new \Controllers\Fonction\action($match, $_POST);
