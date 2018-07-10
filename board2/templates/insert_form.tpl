<html>
<head>
  <title>データの登録</title>
</head>
<body>
  <form method="POST" action="insert_form.php">
    <div><font color="#ff0000">{$error}</font></div>
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
