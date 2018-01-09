<?php
  require_once './process.php'; // login関数の有効化

  session_start();

  $errorMessage = '';
  $process      = new Process;
  if (isset($_POST)) {
    $post       = $_POST;
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
?>


<html>
<head>
  <title>データの登録</title>
</head>
<body>
  <form method="POST" action="login_form.php">
     <div><font color="#ff0000"><?php echo ($errorMessage); ?></font></div>
    <p>なまえ：<br />
      <input type="text" name="name" size="25" maxlength="20" />
    </p>
    <p>ぱすわーど：<br />
      <input type="text" name="password" size="25" maxlength="20" />
    </p>
    <p>
      <input type="submit" name="login" value=" ログイン" />
    </p>
    <p>
    <!-- URL要変更 -->
      <input type="button" name="signup" value=" 新規登録" onClick="location.href='http://localhost/tech-aca5/board2/insert_form.php'" />
    </p>
  </form>
</body>
</html>
