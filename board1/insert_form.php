<html>
<head>
    <title>データの登録</title>
</head>
<body>
<form method="post" action="./insert_process.php">
    <p>
        ISBNコード:<br />
        <input type="text" name="isbn" size="25" maxlength="20" />
    </p><p>
        書名:<br />
        <input type="text" name="title" size="35" maxlength="150" />
    </p><p>
        価格:<br />
        <input type="text" name="price" size="6" maxlength="5" />円
    </p><p>
        出版社:<br />
        <input type="text" name="publish" size="25" maxlength="30" />
    </p><p>
        刊行日:<br />
        <input type="text" name="published" size="15" maxlength="10" />
    </p><p>
        <input type="submit" value="登録" />
    </p>
</form>
</body>
</html>