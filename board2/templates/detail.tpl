<html>
<head>
  <title>データの編集</title>
</head>
<body>
  <form method="POST" action="detail.php">
    <input type="hidden" name="id" size="25" value="{$result['id']}"/>
    <p>ほんぶん：<br />
      <input type="text" name="contents" size="25" value="{$result['contents']}" maxlength="100" />
    </p>
    <p>
      <input type="submit" name="edit" value=" 編集" />
    </p>
    <p>
      <input type="submit" name="delete" value=" 削除" />
    </p>
  </form>
</body>
</html>
