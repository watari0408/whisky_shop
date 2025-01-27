<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>在庫追加確認</title>
</head>
<body>
    <?php
    // エラーレポートを有効にする
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_code'], $_POST['additional_quantity'])) {
        $product_code = filter_input(INPUT_POST, 'product_code', FILTER_SANITIZE_STRING);
        $additional_quantity = filter_input(INPUT_POST, 'additional_quantity', FILTER_SANITIZE_NUMBER_INT);

        // CSVファイルからデータを読み込む
        $data = file('shohin_zaiko.csv', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if ($data === false) {
            echo "<p>商品在庫のデータファイルを読み込めませんでした。</p>";
            exit();
        }

        $found = false;
        foreach ($data as $line) {
            $fields = explode(',', $line);
            if ($fields[0] == $product_code) {
                $product_name = $fields[1];
                $price = $fields[2];
                $stock_quantity = (int)$fields[3]; // 在庫数
                $remaining_quantity = (int)$fields[4]; // 現在の残数
                $found = true;
                break;
            }
        }

        if ($found) {
            echo "<h2>在庫追加確認</h2>";
            echo "<p>商品コード: $product_code</p>";
            echo "<p>商品名: $product_name</p>";
            echo "<p>価格: $price</p>";
            echo "<p>現在の在庫数: $stock_quantity</p>";
            echo "<p>現在の残数: $remaining_quantity</p>"; // 現在の残数を表示
            echo "<p>追加したい数量: $additional_quantity</p>";

            // 在庫を更新してCSVファイルに保存
            $new_data = [];
            foreach ($data as $line) {
                $fields = explode(',', $line);
                if ($fields[0] == $product_code) {
                    $fields[3] = (int)$fields[3] + $additional_quantity;
                }
                $new_data[] = implode(',', $fields);
            }
            $result = file_put_contents('shohin_zaiko.csv', implode("\n", $new_data) . "\n");
            if ($result === false) {
                echo "<p>CSVファイルの更新に失敗しました。</p>";
            } else {
                echo "<p>在庫が更新されました。</p>";
            }
        } else {
            echo "<p>指定された商品コードが見つかりませんでした。</p>";
        }
    } else {
        echo "<p>無効なリクエストです。</p>";
    }
    ?>
</body>
</html>









