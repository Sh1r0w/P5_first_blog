<?php
namespace Controllers\Fonction;

class action extends \Controllers\Fonction\root
{
  protected $n;
    public function __construct($match, array $input){
      //var_dump($input);
        if (isset($_GET['action']) && $_GET['action'] === (($match['target']) . 'Send') && empty($_GET['id']))
        {  
          $this->n = new factory;
          $this->n->posts('Send');
          echo 'ok';
          
        }elseif(isset($_GET['id']) && $_GET['id'] > 0 && $_GET['action'] === ($match['target'] . 'Delete')) {

          $m = 'Controllers\\' . ($match['target'] . 'Delete');
          new $m($_GET['id']);
          echo 'ok1';

        }elseif(isset($_GET['id']) && $_GET['id'] > 0 && $_GET['action'] === ($match['target'] . 'Update')){

          $m = 'Controllers\\' . ($match['target'] . 'Update');
          new $m($_GET['id'], $input);
          
        }elseif(isset($_GET['action']) && $_GET['action'] != ($match['target']) . 'Send'){
          $m = 'Controllers\\' . $_GET['action'];
          $n = new $m;
          $s = $_GET['action'];
          $n->$s($input);
          

          echo 'ok3';
          echo $m;
        }else{
            parent::__construct($match);
        }

    }

}