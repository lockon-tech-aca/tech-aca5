<!DOCTYPE html>
<html>
<head>
    <meta  charset=UTF-8"/>
    <title>complete</title>
</head>
<body>
<!--<include file="error_message.tpl"></include>-->
{if $action == '登録'}
    <h1>{$action}完了画面</h1>
    <a href="smarty_Login.php">ログイン画面に移動する</a>
{/if}
{if $action == 'ログイン'}
    <h1>{$action}完了画面</h1>
    <a href="smarty_board2.php">新規投稿画面に移動する</a>
{/if}
{if $action == 'ログアウト'}
    <p>{$message}</p>
    <a href="smarty_Login.php">ログイン画面に移動する</a>
{/if}
{if $action == '新規投稿'}
    <h1>{$action}完了画面</h1>
    <a href="smarty_board2.php">新規投稿画面に移動する</a>
{/if}
{if $action == '投稿編集'}
    <h1>{$action}完了画面</h1>
    <a href="smarty_board2.php">新規投稿画面に移動する</a>
{/if}
{if $action == '投稿削除'}
    <h1>{$action}完了画面</h1>
    <a href="smarty_board2.php">新規投稿画面に移動する</a>
{/if}
</body>
</html>