<?php
  session_start();
  session_regenerate_id(TRUE);

  require_once('../../../common/define.php');
  require_once('../../../common/sql_admin.php');

  //$_SESSION リセット
  if (isset($_SESSION['err']) && $_SESSION['err'])  unset($_SESSION['err']);
  if (isset($_SESSION['signIn']) && $_SESSION['signIn'])  unset($_SESSION['signIn']);

  $_SESSION['admin']['signIn'] = sanitize($_POST);

  /** validity check
   * 氏名またはニックネーム
   * password
   */
  $validity = TRUE;

  if (!$_SESSION['admin']['signIn']['name'])
  {
    $validity = FALSE;
    $_SESSION['err']['signIn']['name'] = '氏名またはニックネームが入力されていません';
  }

  if (!$_SESSION['admin']['signIn']['pass'])
  {
    $validity = FALSE;
    $_SESSION['err']['signIn']['pass'] = 'パスワードが入力されていません';
  }  elseif (!preg_match('/^[a-zA-Z0-9]{8,16}+$/', $_SESSION['admin']['signIn']['pass']))
  {
    $validity = false;
    $_SESSION['err']['signIn']['pass'] = 'パスワードが間違っています';
  }

  if ($validity == FALSE)
  {
    header('Location: sign_in.php');
    exit();
  }

/** sing in
 * 
 */
  try
  {
    $admin = new adminModel();
    $signIn = $admin->signInCheck($_SESSION['admin']['signIn']['name'], $_SESSION['admin']['signIn']['pass']);
    if ($signIn != 0)
    {
      
      $_SESSION['err']['login']['incorrect'] = '管理者名と管理者パスワードが一致しません';
      header('Location: sign_in.php');
    }
  } catch(Exception $e)
  {
    var_dump($e);
    exit();
    header('Location: ../../../index.php');

  }

  $player = NULL;

  unset($_SESSION["err"]);
  unset($_SESSION['admin']['signIn']['pass']);
  
  $_SESSION['admin']["signIn"]['is_signIn'] = $signIn;
  header('Location: ../../admin_page.php');
?>
