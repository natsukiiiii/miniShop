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
        if(isset($_SESSION['cart']) == true){
            $cart = $_SESSION['cart'];
            $pro_count = count($cart);
        }else{
            $pro_count = 0;
        }

        if($pro_count == 0){
            echo 'カートには何も入ってません
            <br>
            <a href="../index.php">商品一覧に戻る</a>
            ';
            exit();
        }
        $dbh = connectDB();
        $sql = 'select name, price, image from product where id=?';
        $stmt = $dbh->prepare($sql);

        foreach ($cart as $pro_id){
            $data[0] = $pro_id;
            $stmt->execute($data);

            $rec = $stmt->fetch(PDO::FETCH_ASSOC);

            $pro_name[] = $rec['name'];
            $pro_price[] = $rec['price'];
            if($rec['image'] == ''){
                $pro_image[] = '';
            }else{
                $pro_image[] = '<img width="50" src="../product/images/' . $rec['image'] . '" alt="">';
            }
        }

        $dbh = null;

    }catch(Exception $e){
        echo '何かしらのエラーが発生しています';
        echo $e->getMessage();
        exit();
    }
    ?>

    <?php for($i = 0; $i< $pro_count; $i++){ ?>
        <div style="display: grid;">
        <?php echo $pro_name[$i]; ?>:
        <?php echo $pro_price[$i]; ?>円:

        <?php echo $pro_image[$i]; ?>:
        </div>
    <?php } ?>
    <a href="shop_cartclear.php">カートを空にする</a><br>
<a href="../index.php">商品一覧に戻る</a>    
    
    
</body>
</html>