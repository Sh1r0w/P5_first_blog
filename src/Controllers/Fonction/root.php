<?php
namespace Controllers\Fonction;

class root
{
    /**
    * @param __construct $match
    *  the function waits for the rooter's $match to return to the correct file twig
    *   
    */
        public function __construct($match)
    {
    
        
        $loader = new \Twig\Loader\FilesystemLoader('../views/');
        $twig = new \Twig\Environment($loader, [
            'cache' => false,
            'debug' => true,
        ]);
        $twig->addExtension(new \Twig\Extension\DebugExtension());

        $fact = factory::getInstance();

        $twig->addGlobal('session', $_SESSION);
        if(isset($_SESSION['logged_user'], $_SESSION['lastname'], $_SESSION['firstname'])){
            if(file_exists(dirname(__DIR__) . DIRECTORY_SEPARATOR . $match['target'] . 'List' . '.php')){
                
                echo $twig->render($match['target'] . '.twig', [$match['target'] => $fact->posts('List')]);
                
            } elseif(file_exists(dirname(__DIR__) . DIRECTORY_SEPARATOR . $match['target']. 'Controllers' . '.php') && $_GET['action'] == 'postsRead')
            {
                echo $twig->render($match['target'] . '.twig', [$match['target'] => [$fact->postsRead($_GET['id']), $fact->commentRead($_GET['id'])]]);
            }else
            {
                echo $twig->render($match['target'] . '.twig');
            }
        }elseif(isset($_SESSION['logged_user']) && !isset($_SESSION['idUs'])){
            echo $twig->render('user' . '.twig');
            
        }else{
            echo $twig->render('home' . '.twig');
        }
                
    }
}
