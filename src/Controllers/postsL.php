<?php

class postsList
{
    function postsList() 

{
    echo 'ok';
    $postList = new \model\Posts\postsList;
    return $postList->postsList();
    
}


}