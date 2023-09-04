<?php

namespace Controllers\Posts;

/* The `postsSendControllers` class is responsible for sending posts with a title, chapo, content,
author, and image. */
class postsSendControllers
{

   protected $title = null;
   protected $content = null;
   protected $chapo = null;
   protected $author = null;
   protected $id = null;
    
public function postsSend( $title, $chapo ,$content, $author, $img)
{
    if(isset($title, $chapo, $content, $author)){
    $fact = \Controllers\Fonction\factory::getInstance();
    $fact->instance('Model\Posts', 'postsSendModel')->postsSend($title, $chapo ,$content, $author, $img);
    }
    header('location: posts');
}
}