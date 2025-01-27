<html>

<head>
<META charset="UTF-8">
<title>注文確認</title>
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
      color: white; /* リンクの色を白に設定 */
    }
    input[type="text"] {
      color: white; /* テキスト入力欄の文字色を白に設定 */
    }
    input[type="submit"] {
      color: black; /* 送信ボタンの文字色を黒に設定 */
      background-color: white; /* ボタンの背景色を白に設定 */
    }
  </style> 
</head>

<body>
<div class="overlay"></div>
<div class="content">
最終確認<br>
<hr>

<?php
session_start();
$bango=$_POST['ban'];
$namae=$_POST['na'];

print"お届け先：<br>";
print"お名前：".$bango."<br>";
print"ご住所：".$namae."<br>";
print"-----------------------------<br>";
print"ご注文の商品:<br>";

$kensu=count($_SESSION['cart223cj23']);
print"<table border=\"1\">";
print"<tr>";
print"<td>商品番号</td>";
print"<td>商品名</td>";
print"<td>個数</td>";
print"</tr>";
for($i=0; $i<$kensu; $i++){
     print"<tr>";
     print"<td>".$_SESSION['cart223cj23'][$i][0]."</td>";
     print"<td>".$_SESSION['cart223cj23'][$i][1]."</td>";
     print"<td>".$_SESSION['cart223cj23'][$i][2]."</td>";
     print"</tr>";
}
 print"</table>";
 print"<form method=\"post\" action=\"order_kiroku.php\">\n";
 print"<input type=\"hidden\" name=\"na\" value=\"" .$namae. "\">\n";
 print"<input type=\"hidden\" name=\"ban\" value=\"" .$bango. "\">\n";
 print"<input type=\"submit\" value=\"注文を確定する\">\n";
 print"</form>\n";
?>

</div>
</body>
</html>



