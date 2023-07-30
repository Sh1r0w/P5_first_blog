<?php

namespace Controllers\Fonction;

class root
{
    function __construct($match)
    {
        
        $loader = new \Twig\Loader\FilesystemLoader('../views/');

        $twig = new \Twig\Environment($loader, [
            'cache' => false,
        ]);

        echo $twig->render($match['target'] . '.twig');


        /*if (is_array($match)) {

            // Root for send / update / delete page

            if (isset($_GET['action']) && $_GET['action'] !== '') {
                if ($_GET['action'] === ($match['target'] . 'Send')) {

                    ($match['target'] . 'Send')($_POST);
                } elseif ($_GET['action'] === ($match['target'] . 'Update')) {
                    // Soon


                } elseif ($_GET['id'] > 0 && $_GET['action'] === ($match['target'] . 'Delete')) {

                    ($match['target'] . 'Delete')($_GET['id']);
                } else {
                    echo 'ERREUR';
                }
            } elseif ($match['target'] == 'posts' || $match['target'] == 'comment') {

                $p = new \Controllers\postsList;
                $t = $match['target'];
                $m = $p->$t;
                echo $twig->render($match['target'] . '.twig', [$match['target'] => $m]);
            } else {
                echo $twig->render($match['target'] . '.twig');
            }
        } else {

            require "../views/404.twig";
        }*/
    }
}
