<html>
    <head>
        {include file = 'header.tpl' page_title="マイページ"}
    </head>
    <body>
	{$smarty.session.NAME|escape}さんのマイページです
	{if isset($smarty.post.edit)}
	    <form name="post" method="post" action="mypage.php">
		名前:{$smarty.session.NAME|escape}<br>
		ID :
		内容:<br>
		<textarea name="edit_contents" rows="10" cols="30">{$contents|escape}</textarea><br>
		<input type ="hidden" name ="edit_id" value = {$edit_id}>
		<button type="submit" name="action" value="update">更新</button>
	    </form>
	{else}
	<h1>投稿一覧</h1>
	<br>
	
	{section name=item loop=$data}
	    {$data[item].id} : {$smarty.session.NAME|escape} : {$data[item].user_id}<br>
	    {$data[item].contents|escape}<hr>
	    	<form name="post" method="post" action="mypage.php">		
		    <button type='submit' name='delete' value={$data[item].id}>削除</button>	
		    <button type='submit' name='edit' value={$data[item].id}>編集</button>	
		</form>
	{/section}
	{/if}

	<form name="post" method="post" action="mypage.php">
	    <button type='submit' name='index'>投稿ページに戻る</button>
	</form>
	

	
    </body>
</html>
