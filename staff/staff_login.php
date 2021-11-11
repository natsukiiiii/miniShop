<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
・ログインする
  <br>
  <form action="staff_login_check.php" method="POST">
  お名前を入力してください :
    <br>
    <input type="text" name="name">
    <br>
    パスワードを入力してください :
    <br>
    <input type="password" name="pass">
    <br>
    <input type="submit" value="ログインする">

  </form>
  <a href="staff_add.php">新規登録をする</a>
  <br>
  <a href="../index.php">商品一覧へ</a>

</body>
</html>