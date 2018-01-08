<!doctype html>
<html>
    <head>
        {include file = 'header.tpl' page_title="ログアウト"}
    </head>
    <body>
        <h1>ログアウト画面</h1>
        <div>{$errorMessage}</div>
       
        <form name ="login_form" method="post" action="login.php">
	    <button type="submit" name="login_form">ログイン画面</button>
	</form>
        
    </body>
</html>
