<?php
  // エラー表示
  ini_set( 'display_errors', 1 );
  // 定数を設定
  define( 'SMARTY_DIR', './libs/' );
  session_start();

  require_once( SMARTY_DIR .'Smarty.class.php' ); // smartyクラスを読み込む
  require_once './process.php';                   // signup関数の有効化

  $smarty  = new Smarty; // smartyをインスタンス化
  $process = new Process;  // プロセスをインスタンス化

  $errorMessage = '';
  $process      = new Process;
  if (isset($_POST)) {
    $post       = $_POST;
  }

  // 登録ボタンが押された時
  if (isset($post["signup"])) {
    // 入力チェック
    if (empty($post["name"])) {
        $errorMessage = '名前が未入力です。';
    } else if (empty($post["password"])) {
        $errorMessage = 'パスワードが未入力です。';
    }
    // ログインチェック
    if (!empty($post["name"]) && !empty($post["password"])) {
      $result = $process->signup($post);
      $_SESSION['id']   = $check['id'];
      $_SESSION['name'] = $check['name'];
      header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/mypage.php');
    }
  }

  // smartyオブジェクト内の変数へ設定
  $smarty->template_dir = './templates/';
  $smarty->compile_dir  = './templates_c/';
  $smarty->config_dir   = './configs/';
  $smarty->cache_dir    = './cache/';
  $smarty->assign( 'error', $errorMessage );
  $smarty->display( 'insert_form.tpl' );
?>
