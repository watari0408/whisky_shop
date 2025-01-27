<HTML>
<HEAD> 
<META charset="UTF-8">
<TITLE>受注データ表示</TITLE>
</HEAD>
<BODY>



<?php
  $data=file("order.csv");
  $kensu=count($data);
  for($i=0; $i<$kensu; $i++){
     $data[$i]=rtrim($data[$i]);
     $data[$i]=explode(",",$data[$i]);
  }
?>

<table border="1">
<tr>
<td>お客様氏名</td>
<td>ご住所</td>
<td>商品番号</td>
<td>商品名</td>
<td>個数</td>
</tr>

<?php
  for($i=0; $i<$kensu; $i++){
     $photo=$data[$i][0]*10;

     print"<tr>\n";
     print"<td>".$data[$i][0]."</td>\n";
     print"<td>".$data[$i][1]."</td>\n";
     print"<td>".$data[$i][2]."</td>\n";
     print"<td>".$data[$i][3]."</td>\n";
     print"<td>".$data[$i][4]."</td>\n";
     print"</tr>\n";
  }
?>
</table>
<br>
<hr>
<a href="shop_service.php">サイトのトップへ</a>
<br>
</BODY>
</HTML>

