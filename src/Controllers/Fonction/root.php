<?php

namespace Controllers\Fonction;

class root
{
    /**
     * This PHP function renders different Twig templates based on the user's session and the
     * existence of certain files.
     * 
     * @param match The `` parameter is an array that contains information about the current
     * route or URL being accessed. It typically includes the target or controller name, which is
     * used to determine which template to render.
     */
    public function __construct($match)
    {


        $loader = new \Twig\Loader\FilesystemLoader('../views/');
        $twig = new \Twig\Environment($loader, [
            'cache' => false,
            'debug' => true,
        ]);
        $twig->addExtension(new \Twig\Extension\DebugExtension());
        $twig->addGlobal('session', $_SESSION);

        $fact = factory::getInstance();


        if (isset($_SESSION['logged_user'], $_SESSION['lastname'], $_SESSION['firstname'])) {
            if (file_exists(dirname(__DIR__) . DIRECTORY_SEPARATOR . ucfirst($match['target']) . DIRECTORY_SEPARATOR . $match['target'] . 'ListControllers' . '.php')) {

                echo $twig->render($match['target'] . '.twig', [$match['target'] => $fact->postsList('postsList'), 'count' => $fact->commentCount()]);
            } elseif (file_exists(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'posts' . DIRECTORY_SEPARATOR . $match['target'] . 'Controllers' . '.php') && $match['target'] != 'admin') {
                echo $twig->render($match['target'] . '.twig', ['postsRead' => $fact->postsRead($_GET['id']), 'commentsRead' => $fact->commentRead($_GET['id'])]);
            
            }elseif($match['target'] == 'admin' || $match['target'] == 'userList') {
                if($_SESSION['admin'] == '1' && $match['target'] == 'userList' ){
                    echo $twig->render('userListAdmin.twig', ['userList' => $fact->adminList()]);
                 } elseif ($match['target'] == 'admin'){ 
                    echo $twig->render('admin.twig');
                 } elseif ($match['target'] == 'postsListValid'){ 
                    echo $twig->render('postsList.twig');
                 }else{
                    echo $twig->render('home.twig');
                 }
            } else {
                
                echo $twig->render($match['target'] . '.twig');
            }
        } elseif (isset($_SESSION['logged_user']) && !isset($_SESSION['idUs'])) {
            echo $twig->render('user' . '.twig');
        } else {
            echo $twig->render('home' . '.twig');
        }
    }
}
