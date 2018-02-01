<!DOCTYPE html>
<html>
<head>
    <meta  charset=UTF-8"/>
    <title>edit</title>

</head>
<body>
<h1>投稿編集画面</h1>
<form action="smarty_update_comment.php" method="POST">
    <label for="comment">コメント:</label><br>
    <input type="text" name="contents" id="comment" value={$contents}>
    <input type="hidden" name="id" value={$id}>
    <input type = "submit" value = "更新"><br>
</form>
</body>
</html>