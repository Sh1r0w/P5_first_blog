<?php
namespace Controllers\Fonction;

class root
{
    /**
    * @param __construct $match
    *  the function waits for the rooter's $match to return to the correct file twig
    *   
    */
        function __construct($match)
    {
        
        $loader = new \Twig\Loader\FilesystemLoader('../views/');
        $twig = new \Twig\Environment($loader, [
            'cache' => false,
       
        ]);
        $twig->addGlobal('session', $_SESSION);
        if(isset($_SESSION['logged_user'])){
            if(file_exists('../src/controllers' . '/' . $match['target'] . 'List' . '.php')){
                $t = '\Controllers\\' . $match['target'] . 'List';
                $p = new $t;
                $s = $match['target'];
                $m = $p->$s;
                echo $twig->render($match['target'] . '.twig', [$match['target'] => $m]);
                
            } elseif(!isset($_SESSION['firstname'])){
                echo $twig->render('user' . '.twig');

            } else
            {
                echo $twig->render($match['target'] . '.twig');
            }
        }else{
            echo $twig->render('home' . '.twig');
        }
                
    }
}
