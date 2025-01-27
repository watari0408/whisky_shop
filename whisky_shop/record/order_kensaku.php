<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>顧客別発注一覧表</title>
</head>
<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ban'])) {
        $customer_name = filter_input(INPUT_POST, 'ban', FILTER_SANITIZE_STRING);

        // CSVファイルからデータを読み込む
        $data = file('order.csv', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if ($data === false) {
            echo "<p>注文履歴のデータファイルを読み込めませんでした。</p>";
            exit();
        }

        $orders = [];
        foreach ($data as $line) {
            $fields = explode(',', $line);
            if ($fields[0] == $customer_name) {
                $orders[] = $fields;
            }
        }
    ?>
        <h2>顧客別発注一覧表</h2>
        <?php
        if (count($orders) > 0) {
            echo "<table border='1'>";
            echo "<tr><th>顧客名</th><th>注文ID</th><th>商品コード</th><th>商品名</th><th>数量</th></tr>";
            foreach ($orders as $order) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($order[0]) . "</td>";
                echo "<td>" . htmlspecialchars($order[1]) . "</td>";
                echo "<td>" . htmlspecialchars($order[2]) . "</td>";
                echo "<td>" . htmlspecialchars($order[3]) . "</td>";
                echo "<td>" . htmlspecialchars($order[4]) . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>注文履歴が見つかりません。</p>";
        }
        ?>
    <?php
    } else {
        echo "<p>顧客名が送信されていません。</p>";
    }
    ?>
</body>
</html>



