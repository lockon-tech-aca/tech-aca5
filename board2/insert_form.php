<?php
  require_once './process.php'; // signup関数の有効化

  session_start();

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
?>
<html>
<head>
  <title>データの登録</title>
</head>
<body>
  <form method="POST" action="insert_form.php">
    <p>なまえ：<br />
      <input type="text" name="name" size="25" maxlength="20" />
    </p>
    <p>ぱすわーど：<br />
      <input type="text" name="password" size="25" maxlength="20" />
    </p>
    <p>
      <input type="submit" name="signup" value=" 登録" />
    </p>
  </form>
</body>
</html>
