<?php
namespace Controllers\Fonction;

class action extends \Controllers\Fonction\root
{

    public function __construct($match, array $input){
      //var_dump($input);
        if (isset($_GET['action']) && $_GET['action'] === (($match['target']) . 'Send') && empty($_GET['id']))
        {  
          $m = 'Controllers\\' . ($match['target'] . 'Send');
          new $m($input);
          //echo 'ok';
          
        }elseif(isset($_GET['id']) && $_GET['id'] > 0 && $_GET['action'] === ($match['target'] . 'Delete')) {

          $m = 'Controllers\\' . ($match['target'] . 'Delete');
          new $m($_GET['id']);
          //echo 'ok1';

        }elseif(isset($_GET['id']) && $_GET['id'] > 0 && $_GET['action'] === ($match['target'] . 'Update')){

          $m = 'Controllers\\' . ($match['target'] . 'Update');
          new $m($_GET['id'], $input);
          echo 'ok2';
        }elseif(isset($_GET['action']) && $_GET['action'] != ($match['target']) . 'Send'){
          $m = 'Controllers\\' . $_GET['action'];
          new $m($input);
          //echo 'ok3';
          //var_dump($match);
        }else{
            parent::__construct($match);
        }

    }

}