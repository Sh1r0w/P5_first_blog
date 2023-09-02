<?php

namespace Controllers;

class postsSend
{

   protected $title = null;
   protected $content = null;
   protected $chapo = null;
   protected $author = null;
   protected $id = null;
    
public function postsSend( $title, $chapo ,$content, $author, $img)
{
    $fact = \Controllers\Fonction\factory::getInstance();
    $fact->instance('Controllers\Repository', 'postsRepo')->postsSend($title, $chapo ,$content, $author, $img);
    header('location: posts');
}
}