<!DOCTYPE html>
<html>
<head>
    <meta  charset=UTF-8"/>
    <title>board2</title>
</head>
<body>
<h1>掲示板</h1>
<p>Welcome!{$name}さん。</p>
<p>ログアウトはこちら</p>
<a href="smarty_Logout.php">ログアウト</a><br>
<h2>新規投稿</h2>
<form action="smarty_comment_insert.php" method="POST">
    <div>
        <label for="comment">コメント:</label><br>
        <textarea id = "comment" name="contents" cols="30" rows="10" maxlength="80" wrap="hard" placeholder="80字以内で入力してください。"></textarea><br> <br>

        <input type = "submit" value = "送信"><br><br>
</form>


<h2>投稿履歴</h2>
<table border="1">
    <tr>
        <th>投稿ID</th><th>コメント</th><th></th><th></th>
    </tr>
    {foreach from=$data item=row}
            <tr>

                <td> {$row['id']}</td>
                <td>{$row['contents']}</td>

        <form action="smarty_edit_comment.php" method="post">
            <input type="hidden" name="id" value={$row['id']} >
            <input type="hidden" name="contents" value={$row['contents']}>
            <td><input type="submit" value="投稿の編集"><br></td>
        </form>
        <form action="smarty_delete_comment.php" method="post">
            <input type="hidden" name="id" value={$row['id']}>
            <td><input type=submit value=投稿の削除><br></td>
        </form>
    </tr>
    {/foreach}
</body>
</html>