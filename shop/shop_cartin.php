<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require_once('../common/common.php');

    session_start();
    session_regenerate_id(true);

    try{
        $pro_id = $_GET['pro_code'];

        if(isset($_SESSION['cart'])){
            $cart = $_SESSION['cart'];
            if(in_array($pro_id, $cart) == true){
                echo 'この商品はすでにカートに入っています。
                <br>
                <a href="../index.php">商品一覧に戻る</a>';
                exit();
            }
        }

        $cart[] = $pro_id;
        $_SESSION['cart'] = $cart;
    }catch(Exception $e){
     echo '何かしらのエラーが発生しています';
     echo $e->getMessage();
     exit();

    }
    ?>
    カートに追加しました。<br>
  <a href="../index.php">商品一覧に戻る</a>
</body>
</html>