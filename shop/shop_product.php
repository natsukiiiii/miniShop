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

    try{

        $pro_id = $_GET['pro_code'];
        $pro_id = htmlspecialchars($pro_id, ENT_QUOTES, 'UTF-8');

        $dbh = connectDB();

        $sql = 'select name, price, image from product where id=?';
        $stmt = $dbh->prepare($sql);
        $data[] = $pro_id;
        $stmt->execute($data);

        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        $pro_name = $rec['name'];
        $pro_price = $rec['price'];
        $pro_image = $rec['image'];

        $dbh = null;

        if($pro_image == ''){
            $image = '';
        }else{
            $image = '<img width="100" src="../product/images/' . $pro_image . '" ><br>';
        }


    }catch(Exception $e){
     echo'何かしたのエラーが発生しています';
     echo $e->getMessage();
     exit();
    }
    ?>
 ・商品情報<br>
  商品名 : <?php echo $pro_name; ?>
  <br>
  商品の価格 : <?php echo $pro_price; ?>
  <br>
  商品画像 :
  <br>
  <?php echo $image ?>
  <a href="shop_cartin.php?pro_code=<?php echo $pro_id; ?>">カートに入れる</a>
  <!-- !? 上記の？は何？連結？ -->
  <br>
  <input type="button" onclick="history.back()" value="戻る">

</body>
</html>