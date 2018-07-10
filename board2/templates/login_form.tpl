<html>
<head>
  <title>ログイン画面</title>
</head>
<body>
  <form method="POST" action="login_form.php">
     <div><font color="#ff0000">{$error}</font></div>
    <p>なまえ：<br />
      <input type="text" name="name" size="25" value="{$post['name']}" maxlength="20" />
    </p>
    <p>ぱすわーど：<br />
      <input type="text" name="password" size="25" value="{$post['password']}"maxlength="20" />
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
