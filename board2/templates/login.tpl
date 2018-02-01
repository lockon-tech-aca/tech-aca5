<html>
    <head>
        {include file = 'header.tpl' page_title="ログイン画面"}
    </head>
    <body>
        <h1>ログイン画面</h1>
        <form id="login_form" name="login.php" action="" method="POST">
            <fieldset>
                <legend>ログインフォーム</legend>
		{if $errorMessage != ""}
		    <div><font color="#ff0000">{$errorMessage}</font></div>
		{/if}
                <label for="user_id">ユーザーID</label><input type="text" id="user_id" name="user_id" placeholder="ユーザーIDを入力" value="{$user_id}">
                <br>
                <label for="password">パスワード</label><input type="password" id="password" name="password" value="" placeholder="パスワードを入力">
                <br>
                <button type="submit" id="login" name="action" value="login">ログイン</botton>
            </fieldset>
        </form>
        <br>
        <form action="signUp.php">
            <fieldset>
		<legend>新規登録フォーム</legend>
                <button type="submit" id ="signUp" name="action" value="signUp">新規登録</button>
    
            </fieldset>
        </form>
    </body>
</html>
