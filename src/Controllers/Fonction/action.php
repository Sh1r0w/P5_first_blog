<?php

namespace Controllers\Fonction;

class action extends \Controllers\Fonction\root
{

  public function __construct($match, array $input)
  {
    $fact = factory::getInstance();
    if (isset($_GET['action'])) { 
        $action = $_GET['action'];
        $fact->$action($action, $input, $_GET['id']);
    }else {
      parent::__construct($match);
    }
  }
}
