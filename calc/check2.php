<?php require_once 'Encode.php'; ?>
<html>
<head>
    <title>チェックボックス</title>
</head>
<body>
選択されたのは<?php e(implode(',', $_POST['arch'])); ?>
</body>
</html>
