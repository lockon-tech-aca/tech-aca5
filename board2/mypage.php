<?php
  // エラー表示
  ini_set( 'display_errors', 1 );
  // 定数を設定
  define( 'SMARTY_DIR', './libs/' );
  session_start();

  require_once( SMARTY_DIR .'Smarty.class.php' ); // smartyクラスを読み込む
  require_once './Encode.php';                    // e関数の有効化
  require_once './process.php';                   // signup関数の有効化
  require_once './DbManager.php';                 // getDb関数の有効化

  $smarty  = new Smarty; // smartyをインスタンス化
  $process = new Process;  // プロセスをインスタンス化

  // ログイン状態チェック
  if (!isset($_SESSION["id"])) {
    header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/login_form.php');
    die;
  }

  $errorMessage = '';
  $process      = new Process;
  if (isset($_POST)) {
    $post       = $_POST;
  }

  // DBに接続
  try {
    // DB接続を確立
    $db  = getDb();
    // SELECT命令の実行
    $stt = $db->prepare('SELECT * FROM post_table');
    $stt->execute();
    // 結果のセット
    while ($row = $stt->fetch(PDO::FETCH_ASSOC)){
      $result[] = $row;
    }
  } catch (PDOException $e) {
    die ("エラーメッセージ：{$e->getMessage()}");
  }

  // 登録ボタンが押された時
  if (isset($post["mypost"])) {
    // 入力チェック
    if (empty($post["contents"])) {
        $errorMessage = '本文が未入力です。';
    } else {
      $post['user_id'] = $_SESSION['id'];
      $process->mypost($post);
      header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/mypage.php');
    }
  }

  // smartyオブジェクト内の変数へ設定
  $smarty->template_dir = './templates/';
  $smarty->compile_dir  = './templates_c/';
  $smarty->config_dir   = './configs/';
  $smarty->cache_dir    = './cache/';
  //smartyクラスのオブジェクト内のassignメソッドで (Key,value)の形式で値をセット
  $smarty->assign( 'session', $_SESSION );
  $smarty->assign( 'result', $result );
  // smartyクラスのdisplayメソッドで、画面テンプレートを指定
  $smarty->display( 'mypage.tpl' );
?>
