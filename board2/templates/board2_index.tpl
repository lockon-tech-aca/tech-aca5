<html>
    <head>
        {include file = 'header.tpl' page_title="掲示板"}
    </head>
    <body>
	こんにちは{$smarty.session.NAME|escape}さん
	<h1>投稿一覧</h1>
	<br>
	
	{section name=item loop=$data}
	    {$data[item].id} : {$data[item].name|escape} : {$data[item].user_id}<br>
	    {$data[item].contents|escape}<hr>
	{/section}
	
	<form name="post" method="post" action="board2_index.php">
	    名前 : {$smarty.session.NAME|escape}<br>
	    内容 :<br>
	    <textarea name="contents" rows="10" cols="30"></textarea><br>
	    <button type="submit" name ="action" value ="send">投稿</button>
	</form>

	<form name="mypage" method="post" action="mypage.php">
 	    <button type="submit" name ="action" value="mypage">自分の投稿を編集</button>
	</form>

	<form name="logout" method="post" action="logout.php">
	    <button type="submit" name ="action" value="logout">ログアウト</button>
	</form>
    </body>
</html>
