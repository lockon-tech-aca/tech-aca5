<html>
    <head>
        <title>マイページ</title>
    </head>
    <body>
        <p>ようこそ<u>{$session['name']}</u>さん</p>
        <body>
          <form method="POST" action="mypage.php">
            <p>ほんぶん：<br />
              <input type="text" name="contents" size="25" maxlength="100" />
            </p>
            <p>
              <input type="submit" name="mypost" value=" 登録" />
            </p>
          </form>
        </body>

        <table border='1'>
          <tr>
            <th>id</th>
            <th>ほんぶん</th>
            <th>ボタン</th>
          <tr>
{foreach from=$result item=var}
          <tr>
            <td>{$var['id']}</td>
            <td>{$var['contents']}</td>
            <td>{if $var['user_id'] == $session['id']}
                <form method="POST" action="detail.php">
                  <input type="hidden" name="id" value="{$var['id']}">
                  <input type="submit" name="edit" value=" 編集">
                </form>
                {/if}</td>
          </tr>
{/foreach}
        <ul>
            <li><a href="login_form.php">ログアウト</a></li>
        </ul>
    </body>
</html>
