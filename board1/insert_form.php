<html>
<head>
  <title>データの登録</title>
</head>
<body>
  <form method="POST" action="insert_process.php">
    <p>なまえ：<br />
      <input type="text" name="name" size="25" maxlength="20" />
    </p>
    <p>ないよう：<br />
      <input type="text" name="contents" size="25" maxlength="20" />
    </p>
    <p>
      <input type="submit" value=" 登録" />
    </p>
  </form>

<?php
  require_once './DbManager.php';  // getDb関数の有効化
  require_once './Encode.php';     // e関数の有効化
?>

  <table border='1'>
    <tr>
      <th>なまえ</th>
      <th>ないよう</th>
    <tr>

<?php
  try {
    // DB接続を確立
    $db  = getDb();
    // SELECT命令の実行
    $stt = $db->prepare('SELECT * FROM post_table ORDER BY name DESC');
    $stt->execute();
    // 結果セットの内容を順に出力
    while($row = $stt->fetch(PDO::FETCH_ASSOC)) {
?>

    <tr>
      <td><?php e($row['name']); ?></td>
      <td><?php e($row['contents']); ?></td>
    </tr>

<?php
    }
    $db =NULL;
  } catch (PDOException $e) {
    die ("エラーメッセージ：{$e->getMessage()}");
  }
?>

  </table>
</body>
</html>
