<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
・ユーザー登録をする
<form method="POST" action="staff_add_check.php">
あなたのお名前を入力してください
    <br>
    <input type="text" name="name">
    <br>
    パスワードを入力してください
    <br>
    <input type="password" name="pass1">
    <br>
    もう一度パスワードを入力してください
    <br>
    <input type="password" name="pass2">
    <br>
    <input type="button" onclick="history.back()" value="戻る">
    <input type="submit" value="確認">

</form>
</body>
</html>