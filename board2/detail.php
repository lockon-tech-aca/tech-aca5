<?php
  // エラー表示
  ini_set( 'display_errors', 1 );
  // 定数を設定
  define( 'SMARTY_DIR', './libs/' );
  require_once( SMARTY_DIR .'Smarty.class.php' ); // smartyクラスを読み込む
  require_once './process.php';                   // delete,edit関数の有効化

  $smarty  = new Smarty; // smartyをインスタンス化
  $process = new Process;  // プロセスをインスタンス化

  $errorMessage = '';
  if (isset($_POST)) {
    $post       = $_POST;
  }
  $result = $process->select($post);

  // 編集ボタンが押された時
  if (isset($post["edit"])) {
    // 入力チェック
    if (empty($post["contents"])) {
        $errorMessage = '本文が未入力です。';
    } else {
      $process->edit($post);
      header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/mypage.php');
    }
  // 削除ボタンが押されたとき
  } elseif (isset($post["delete"])) {
    $process->delete($post);
    header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/mypage.php');
  }

  // smartyオブジェクト内の変数へ設定
  $smarty->template_dir = './templates/';
  $smarty->compile_dir  = './templates_c/';
  $smarty->config_dir   = './configs/';
  $smarty->cache_dir    = './cache/';
  $smarty->assign( 'result', $result );
  $smarty->display( 'detail.tpl' );
?>
