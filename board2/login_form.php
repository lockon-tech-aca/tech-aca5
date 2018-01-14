<?php
  // エラー表示
  ini_set( 'display_errors', 1 );
  // 定数を設定
  define( 'SMARTY_DIR', './libs/' );
  session_start();

  require_once( SMARTY_DIR .'Smarty.class.php' ); // smartyの有効化
  require_once './process.php';                   // login関数の有効化

  $smarty  = new Smarty; // smartyをインスタンス化
  $process = new Process;  // プロセスをインスタンス化

  $errorMessage = '';
  if (!empty($_POST)) {
    $post       = $_POST;
  } else {
    $post["name"] = "";
    $post["password"] = "";
  }

  // ログインボタンが押された時
  if (isset($post["login"])) {
    // 入力チェック
    if (empty($post["name"])) {
        $errorMessage = '名前が未入力です。';
    } else if (empty($post["password"])) {
        $errorMessage = 'パスワードが未入力です。';
    }
    // ログインチェック
    if (!empty($post["name"]) && !empty($post["password"])) {
      $check = $process->login($post);
      if ($check === false) {
        $errorMessage = 'パスワードが間違っています';
      } else {
        $_SESSION['id'] = $check['id'];
        $_SESSION['name'] = $check['name'];
        // idもたせてページ遷移
        header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/mypage.php');
      }
    }
  }

  // smartyオブジェクト内の変数へ設定
  $smarty->template_dir = './templates/';
  $smarty->compile_dir  = './templates_c/';
  $smarty->config_dir   = './configs/';
  $smarty->cache_dir    = './cache/';
  $smarty->assign( 'post', $post );
  $smarty->assign( 'error', $errorMessage );
  $smarty->display( 'login_form.tpl' );
?>
