<html>
<head>
<meta charset="UTF-8">
<title>お届け先入力</title>
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
お届け先を入力してください。
<hr>
<?php
 session_start();
 print"<form method=\"POST\" action=\"order_kakunin.php\">\n";
 print"お名前<input type=\"text\" name=\"na\"><br>\n";
 print"ご住所（学籍番号）<input type=\"text\" name=\"ban\">\n";
 print"<input type=\"submit\" value=\"送信\">\n";
 print"</form>\n";
?>
</div>
</body>
</html>
