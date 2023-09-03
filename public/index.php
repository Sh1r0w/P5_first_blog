<?php
session_start();
require_once '../vendor/autoload.php';

/**
 * load Autoloader for add require path
 */
require_once '../src/Controllers/Fonction/Autoloader.php';

\Controllers\Fonction\Autoloader::register();

$fact = \Controllers\Fonction\factory::getInstance();

/**
 * use Altorooter
 */
$router = new AltoRouter();

$router->map('GET', '/', 'home', 'homepage');
$router->map('GET|POST', '/user', 'user', 'user');
$router->map('GET|POST', '/posts', 'posts', 'postsList');
$router->map('GET|POST', '/postsRead', 'postsRead', 'postsRead');
$router->map('GET|POST', '/comments', 'comments', 'comments');
$router->map('GET|POST', '/admin', 'admin', 'admin');
$router->map('GET|POST', '/userList', 'userList', 'userList');
$router->map('GET|POST', '/postsListValid', 'postsListValid', 'postsListValid');

$match = $router->match();

/**
 * load bdd 
 * @param action $match altorouter and $_POST
 */

$d = new \Controllers\Fonction\db;
$a = new \Controllers\Fonction\action($match, $_POST);