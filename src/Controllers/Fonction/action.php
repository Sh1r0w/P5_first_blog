<?php
namespace Controllers\Fonction;

class action extends \Controllers\Fonction\root
{
    
    public function action($match){

        if (isset($_GET['action']) && $_GET['action'] == ($match['target']) . 'Send')
        {
            ($match['target']) . 'Send'($_POST);
            
        }

    }


}