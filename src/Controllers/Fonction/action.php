<?php

namespace Controllers\Fonction;

class action extends \Controllers\Fonction\root
{

  protected $n;
  public function __construct($match, array $input)
  {
    $fact = factory::getInstance();
    if (isset($_GET['action']) && $_GET['action'] === (($match['target']) . 'Send') && empty($_GET['id'])) {

      $fact->titlePost($input);
      $fact->contentPost($input);
      $fact->chapoPost($input);
      $fact->authorPost($input);
      $fact->posts('Send');
    } elseif (isset($_GET['id']) && $_GET['id'] > 0 && $_GET['action'] === ($match['target'] . 'Delete')) {

      $m = 'Controllers\\' . ($match['target'] . 'Delete');
      new $m($_GET['id']);
      echo 'ok1';
    } elseif (isset($_GET['id']) && $_GET['id'] > 0 && $_GET['action'] === ($match['target'] . 'Update')) {

      $m = 'Controllers\\' . ($match['target'] . 'Update');
      new $m($_GET['id'], $input);
    } elseif (isset($_GET['action']) && $_GET['action'] != ($match['target']) . 'Send') {
      
      if ($_GET['action'] == 'logout') {
        $fact->logout();
      } elseif ($_GET['action'] == 'userUpdate') {
        $fact->user('user', 'Update', $input);
      } elseif ($_GET['action'] == 'loginSend') {
        $fact->userLog('Send', $input); 
      } elseif ($_GET['action'] == 'loginCreateSend') {
        $fact->userLog('CreateSend', $input);
      }

      //echo 'ok3';
    } else {
      parent::__construct($match);
    }
  }
}
