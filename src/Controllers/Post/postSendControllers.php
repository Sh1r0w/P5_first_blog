<?php

namespace Controllers\Post;

/* The `postSendControllers` class is responsible for sending post with a title, chapo, content,
author, and image. */
class postSendControllers
{

   protected $title = null;
   protected $content = null;
   protected $chapo = null;
   protected $author = null;
   protected $id = null;
    
public function postSend( $title, $chapo ,$content, $author,\Controllers\Fonction\factory $fact)
{
    if(isset($title, $chapo, $content, $author)){
    $img = $fact->instance('Controllers\Fonction', 'getImg')->getImg();
    $fact->instance('Model\post', 'postSendModel')->postSend($title, $chapo ,$content, $author, $img, $fact);
    }
    header('location: post');
}
}