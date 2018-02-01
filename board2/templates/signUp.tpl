<html>
    <head>
        {include file = 'header.tpl' page_title="新規登録画面"}
    </head>
    <body>
	
	{*登録が完了している場合は登録内容を表示*}
	{if $user_id != NULL}
	    {include file = 'comp_signUp.tpl' user_name = $user_name user_id = $user_id}
	{else}
	{*登録が済んでいない場合*}
        <h1>新規登録画面</h1>
        <form id="signUp_form" name="signUp.php" action="" method="POST">
            <fieldset>
                <legend>新規登録フォーム</legend>
		{if $errorMessage != ""}
		    <h2>{$errorMessage}</h2>
		{/if}
		    
                <label for="user_name">ユーザー名</label><input type="text" id="user_name" name="user_name" placeholder="ユーザー名を入力" value="">
                <br>
                <label for="password">パスワード</label><input type="password" id="password" name="password" value="" placeholder="パスワードを入力">
                <br>
                <button type="submit" id="signUp" name="action" value="signUp">新規登録</button>
		<button type='submit' id="login_form" name="action" value="login_form">ログイン画面</button>
            </fieldset>
	{/if}
    </body>
</html>
