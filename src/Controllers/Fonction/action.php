<?php
namespace Controllers\Fonction;

class action extends \Controllers\Fonction\root
{

    public function __construct($match, array $input){
        if (isset($_GET['action']) && $_GET['action'] === (($match['target']) . 'Send') && $_GET['id'] === null)
        {
          $m = 'Controllers\\' . ($match['target'] . 'Send');
          new $m($input);
          
        }elseif(isset($_GET['id']) && $_GET['id'] > 0 && $_GET['action'] === ($match['target'] . 'Delete')) {

          $m = 'Controllers\\' . ($match['target'] . 'Delete');
          new $m($_GET['id']);


        }elseif(isset($_GET['id']) && $_GET['id'] > 0 && $_GET['action'] === ($match['target'] . 'Update')){

          $m = 'Controllers\\' . ($match['target'] . 'Update');
          new $m($_GET['id'], $input);

        }elseif(isset($_GET['action']) && $_GET['action'] != ($match['target']) . 'Send'){
          $m = 'Controllers\\' . $_GET['action'];
          new $m($input);

        }else{
            parent::__construct($match);
        }

    }

}