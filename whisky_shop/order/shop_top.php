<!DOCTYPE html>
<html>
<head> 
  <meta charset="UTF-8">
  <title>店舗トップページ</title>
  <style type="text/css">
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
    body {
      position: relative;
      background-image: url('glass.jpg');
      background-attachment: fixed; /* 背景画像を固定 */
      background-size: cover; /* 画像を全体にフィットさせる */
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
    hr {
      border-color: white; /* 水平線を白に設定 */
    }
  </style> 
</head>
</html>
<body>
  <div class="overlay"></div>
  <div class="content">
    <center><font size="5">ようこそ渡酒造へ</font></center>
    <br>
    <hr>
  </div>
</body>
</html>

<?php
  $data = file("shohin_zaiko.csv");
  $kensu = count($data);
  for($i = 0; $i < $kensu; $i++){
     $data[$i] = rtrim($data[$i]);
     $data[$i] = explode(",", $data[$i]);
  }
?>

<table border="1">
<?php
  for($i = 0; $i < $kensu; $i++){
    // 2列目の商品を表示するための条件
    if ($i % 2 == 0) {
        print "<tr>\n";
    }
    $photo = $data[$i][0] * 10;
    print "<td>\n";
    print "<p>商品コード: ".$data[$i][0]."</p>\n";
    print "<p>商品名: ".$data[$i][1]."</p>\n";
    print "<p>価格: ".$data[$i][2]."</p>\n";
    print "<p>残数: ".$data[$i][3]."</p>\n";
    print "<p><img src=\"".$photo.".jpg\"></p>\n";
    
    print "<form action=\"shohin.php\" method=\"POST\">";
    print "<input type=\"submit\" value=\"この商品を見る\">";
    print "<input type=\"hidden\" name=\"bango\" value=\"".$data[$i][0]."\">";
    print "<input type=\"hidden\" name=\"zaiko\" value=\"".$data[$i][3]."\">"; // 在庫量を追加
    print "</form>\n";
    
    print "</td>\n";
    // 行の終わり
    if ($i % 2 == 1) {
        print "</tr>\n";
    }
  }
  // 商品が奇数個の場合、最後の行を閉じる
  if ($kensu % 2 != 0) {
      print "</tr>\n";
  }
?>
</table>
</BODY>
</HTML>



