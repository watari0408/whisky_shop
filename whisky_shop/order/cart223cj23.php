<HTML>
<HEAD> 
<META charset="UTF-8">
<TITLE>商品紹介ページ</TITLE>
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
  </style> 
</HEAD>
<BODY>
<div class="overlay"></div>
<div class="content">
<?php
session_start();
$bango = $_POST['ban'];
$namae = $_POST['na'];
$suryo = $_POST['su'];
$zaiko = $_POST['zaiko']; // 在庫量を取得

// 在庫量と発注量を比較
if ($zaiko < $suryo) {
    // エラーメッセージと shohin.php へのリンクを表示
    echo "発注量が在庫量を超えています。<br>";
    echo "<a href='shop_top.php?bango={$bango}'>トップページに戻る</a>";
    exit;
}

$kensu = count($_SESSION['cart223cj23']);
$fr = 0;
for ($i = 0; $i < $kensu; $i++) {
    if ($bango == $_SESSION['cart223cj23'][$i][0]) { // 同じ番号があるとき
        $_SESSION['cart223cj23'][$i][2] = $suryo;
        $fr = 1;
    }
}

if ($fr == 0) { // 同じ番号がなかった          
    $_SESSION['cart223cj23'][$i][0] = $bango;
    $_SESSION['cart223cj23'][$i][1] = $namae;
    $_SESSION['cart223cj23'][$i][2] = $suryo;
}

$kensu = count($_SESSION['cart223cj23']);
print "<table border=\"1\">";
print "<tr>";
print "<td>商品番号</td>";
print "<td>商品名</td>";
print "<td>個数</td>";
print "</tr>";
for ($i = 0; $i < $kensu; $i++) {
    print "<tr>";
    print "<td>" . $_SESSION['cart223cj23'][$i][0] . "</td>";
    print "<td>" . $_SESSION['cart223cj23'][$i][1] . "</td>";
    print "<td>" . $_SESSION['cart223cj23'][$i][2] . "</td>";
    print "</tr>";
}
print "</table>";
?>
<a href="input_jusho.php">注文を確定しお届け先を入力する</a>
<br> 
<a href="shop_top.php">商品トップページに戻る</a>
</div>
</BODY>
</HTML>





