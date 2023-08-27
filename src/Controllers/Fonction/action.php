<?php

namespace Controllers\Fonction;

/* The "action" class in PHP handles actions based on the "action" parameter in the URL. */
class action extends \Controllers\Fonction\root
{

  /**
   * The function checks if an action is set in the GET parameters and calls the corresponding method
   * in the factory class with the action, input, and id as arguments, otherwise it calls the parent
   * constructor.
   * 
   * @param match The "match" parameter is likely a variable that holds some sort of matching
   * information or pattern. It could be used to determine if a certain condition or criteria is met.
   * Without more context, it's difficult to determine the exact purpose of this parameter.
   * @param array input The `` parameter is an array that contains the input data for the
   * constructor. It is passed as an argument to the constructor when it is called.
   */
  public function __construct($match, array $input)
  {
    $fact = factory::getInstance();
    if (isset($_GET['action'])) { 
        $action = $_GET['action'];
        $fact->$action($action, $input, $_GET['id'] = null);
    }else {
      parent::__construct($match);
    }
  }
}
