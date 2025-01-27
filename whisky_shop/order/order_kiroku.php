<html>
<head>
<meta charset="UTF-8">
<title>注文データの記録</title>
<style type="text/css">
    body {
      position: relative;
      background-image: url('glass.jpg');
      background-attachment: fixed;
      background-size: cover;
    }
    .overlay {
      background-color: rgba(255, 255, 255, 0.2); /* 透明度を調整 */
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 1;
      pointer-events: none; /* オーバーレイをクリック不可にする */
    }
    .content {
      position: relative;
      z-index: 2;
      color: white; /* フォントカラーを白に設定 */
    }
    table {
      empty-cells: hide;
      text-align: center;
      vertical-align: middle;
      width: 100%;
      table-layout: fixed;
      border-collapse: collapse; /* テーブルセルの隙間をなくす */
    }
    td {
      width: 50%;
      border: 1px solid white; /* 各セルにボーダーを白に変更 */
      padding: 10px; /* 内側に余白を追加 */
      color: white; /* セル内の文字色を白に変更 */
    }
    hr {
      border-color: white; /* 水平線を白に設定 */
    }
    a {
      color: black; /* リンクの色を黒に設定 */
    }
    input[type="text"] {
      color: white; /* テキスト入力欄の文字色を白に設定 */
    }
  </style>
</head>
<body>
<div class="overlay"></div>
<div class="content">
注文を受け付けています。<br><br>
<hr>
<br>

<?php
 session_start();
 $namae = $_POST['na'];
 $bango = $_POST['ban'];

 // 在庫データの読み込み
 $data = file("shohin_zaiko.csv");
 $kensu = count($data);

 for($i = 0; $i < $kensu; $i++){
     $data[$i] = rtrim($data[$i]);
     $data[$i] = explode(",", $data[$i]);
 }

 print "お名前: " . $namae . "<br>";
 print "お届け先: " . $bango . "<br>";

 print "<table border=\"1\">";
 print "<tr>";
 print "<td>商品番号</td>";
 print "<td>商品名</td>";
 print "<td>個数</td>";
 print "</tr>";
 $cart_items = count($_SESSION['cart223cj23']);
 for($i = 0; $i < $cart_items; $i++){
     print "<tr>";
     print "<td>" . $_SESSION['cart223cj23'][$i][0] . "</td>";
     print "<td>" . $_SESSION['cart223cj23'][$i][1] . "</td>";
     print "<td>" . $_SESSION['cart223cj23'][$i][2] . "</td>";
     print "</tr>";
 }
 print "</table>";

 // 注文情報をCSVファイルに書き込む
 $fp = fopen("order.csv", "a");
 for($i = 0; $i < $cart_items; $i++){
      fputs($fp, $namae . "," . $bango . "," . $_SESSION['cart223cj23'][$i][0] . "," . $_SESSION['cart223cj23'][$i][1] . "," . $_SESSION['cart223cj23'][$i][2] . "\n");
 }
 fclose($fp);

 // 商品データの更新
 $fp = fopen("shohin_zaiko.csv", "w");
 for($i = 0; $i < $kensu; $i++){
     $updated = false;
     for($j = 0; $j < $cart_items; $j++){
         // 最新の在庫量と発注量を比較
         if($data[$i][0] == $_SESSION['cart223cj23'][$j][0]){
             $new_zaiko = $data[$i][3] - $_SESSION['cart223cj23'][$j][2];  // 在庫を減らす
             $data[$i][3] = $new_zaiko;  // 更新された在庫数量
             fputs($fp, implode(",", $data[$i]) . "\n");
             $updated = true;
             break;
         }
     }
     if(!$updated){
         fputs($fp, implode(",", $data[$i]) . "\n");
     }
 }
 fclose($fp);

 // セッションを破壊する（買い物かごの商品が消える）
 session_destroy();
?>
<br>
<hr>
注文が完了しました。<br>
注文履歴はサイトのトップページからご確認ください。<br>
<br>
<hr>
<a href="shop_service.php" style="color: black;">サイトのトップへ</a>
<br>
</div>
</body>
</html>






