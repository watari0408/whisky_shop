<!DOCTYPE html>
<html>
<head> 
  <meta charset="UTF-8">
  <title>商品紹介ページ</title>
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
  </style> 
</head>
<body>
  <div class="overlay"></div>
  <div class="content">
    <center><font size="5">お客様が選択された商品です。</font></center>
    <br>
    <hr>

    <?php
      session_start();
      
      // セッション変数 'a' に値を設定
      $_SESSION['a'] = 1;
      // print $_SESSION['a']; // コメントアウトまたは削除
      
      // フォームから送信された商品番号と在庫量を取得
      $bango = $_POST['bango'];
      $zaiko = $_POST['zaiko']; // 在庫量を取得
      
      // CSVファイルの読み込み
      $data = file("shohin_zaiko.csv");
      
      // 商品数をカウント
      $kensu = count($data);

      // CSVデータを整形
      for($i = 0; $i < $kensu; $i++){
         // 改行を取り除く
         $data[$i] = rtrim($data[$i]);
         // カンマで分割して配列に変換
         $data[$i] = explode(",", $data[$i]);
      }

      // 商品情報の表示
      for($i = 0; $i < $kensu; $i++){
         if($bango == $data[$i][0]){
              // 商品の写真ファイル名を生成
              $photo = $data[$i][0] * 10;
              
              // 商品情報の表示
              print "<img src=\"" . $photo . ".jpg\"><br><br>\n";
              print "商品番号：" . $data[$i][0] . "<br>\n";
              print "商品名：" . $data[$i][1] . "<br>\n";
              print "価格：" . $data[$i][2] . "円<br>\n";
              print "残り：" . $data[$i][3] . "個</td>\n";
         
              // カートに追加するためのフォームの表示
              print "<form action=\"cart223cj23.php\" method=\"POST\">";
              
              // カートに既に追加されている商品の個数を設定
              if(isset($_SESSION['cart223cj23'][$i][2])){
                 $hozon = $_SESSION['cart223cj23'][$i][2];
              } else {
                 // カートに商品がない場合は個数を1に設定
                 $hozon = 1;
              }
              
              // 在庫量を hidden フィールドで追加
              print "<input type=\"hidden\" name=\"zaiko\" value=\"" . $zaiko . "\">";
              
              // 個数入力欄と送信ボタン、商品番号と商品名のhiddenフィールド
              print "<input type=\"text\" name=\"su\" value=\"" . $hozon . "\" size=\"4\">";
              print "<input type=\"submit\" value=\"カートに入れる\">";
              print "<input type=\"hidden\" name=\"ban\" value=\"" . $data[$i][0] . "\">";
              print "<input type=\"hidden\" name=\"na\" value=\"" . $data[$i][1] . "\">";
              print "</form>";
         }
      }
    ?>
  </div>
</body>
</html>



