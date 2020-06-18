<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>出力結果</title>
</head>

<body>
    <?php
    var_dump($_POST);
    exit();

















    
    //print_r($_POST);
//名前取得
    echo htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    echo "<br>";
    // var_dump($_POST);
    // exit();
//年齢取得
    if ($_POST['age'] === '1') echo "10代";
    if ($_POST['age'] === '2') echo "20代";
    if ($_POST['age'] === '3') echo "30代";
    if ($_POST['age'] === '4') echo "40代以上";
    echo "<br>";
//予算取得
    if(is_numeric($_POST['budget'])) {
        echo number_format($_POST['budget']);
    }
    echo "<br>";

    echo $_POST['opinion'];
    echo nl2br(htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8'));
    echo"<br>";

    ?>
</body>

</html>