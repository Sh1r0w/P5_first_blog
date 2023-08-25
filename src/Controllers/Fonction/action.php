<?php

namespace Controllers\Fonction;

class action extends \Controllers\Fonction\root
{

  protected $n;
  public function __construct($match, array $input)
  {
    $fact = factory::getInstance();
    if (isset($_GET['action']) && $_GET['action'] != 'postsUpdate' && $_GET['action'] != 'postsDelete') {
      echo 'ok2';
      if ($_GET['action'] == 'postsSend') {
        $fact->posts('Send', $input);
      } elseif ($_GET['action'] == 'commentSend') {
        $fact->contentComment($input);
        $fact->comment('Send', $_GET['id']);
      } elseif ($_GET['action'] == 'logout') {
        $fact->logout();
      } elseif ($_GET['action'] == 'userUpdate') {
        $fact->user('user', 'Update', $input);
      } elseif ($_GET['action'] == 'loginSend') {
        $fact->userLog('Send', $input);
      } elseif ($_GET['action'] == 'loginCreateSend') {
        $fact->userLog('CreateSend', $input);
      }
    } elseif (isset($_GET['id']) && $_GET['id'] > 0 && $_GET['action'] === ($match['target'] . 'Delete')) {

      $m = 'Controllers\\' . ($match['target'] . 'Delete');
      new $m($_GET['id']);
      echo 'ok1';
    } elseif (isset($_GET['id']) && $_GET['id'] > 0 && $_GET['action'] === ($match['target'] . 'Update')) {
      echo 'ok';
      $m = 'Controllers\\' . ($match['target'] . 'Update');
      new $m($_GET['id'], $input);
    } else {
      parent::__construct($match);
    }
  }
}
