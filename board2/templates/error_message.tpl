<!DOCTYPE html>
<html>
<head>
    <meta  charset=UTF-8"/>
    <title>error_message</title>
</head>
<body>
{if $error_message != ''}
    <!--エラーメッセージの表示-->
    {$error_message}
    {if $reaction == '新規登録'}
    <a href="smarty_SignUp.php">{$reaction}画面に戻る</a>
    {/if}
    {if $reaction == 'ログイン'}
        <a href="smarty_Login.php">{$reaction}画面に戻る</a>
    {/if}
    {if $reaction == '新規投稿'}
        <a href="smarty_board2.php">{$reaction}画面に戻る</a>
    {/if}
    {if $reaction == '投稿編集'}
        <a href="smarty_edit_comment.php">{$reaction}画面に戻る</a>
    {/if}
{/if}
</body>
</html>



