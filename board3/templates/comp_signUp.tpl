<html>
    <head>
        {include file = 'header.tpl' page_title="登録完了"}
    </head>
    <body>
        <h1>登録完了</h1>
	<EM>あなたのユーザー名は<B>{$user_name|escape}</B>です</EM>
	<EM>あなたのユーザーIDは<B>{$user_id}</B>です</EM>
        <form id="comp_signUp" name="comp_signUp" action="" method="POST">
            <fieldset>
		<button type='submit' id="login_form" name="action" value="login_form">ログイン画面へ</button>
            </fieldset>
    </body>
</html>
