<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>商品在庫追加フォーム</title>
</head>
<body>
    商品在庫追加フォーム<br>
    <form action="kakunin_shop.php" method="post">
        商品コード: <input type="text" name="product_code" size="10" required><br>
        追加数量: <input type="text" name="additional_quantity" size="10" required><br>
        <input type="submit" value="送信">
        <input type="reset" value="リセット">
    </form>
</body>
</html>


