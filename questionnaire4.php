<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>アンケート入力ページ</h1>

    <form action="questionnaire5.php" method="post">
        <div>
            <p>自分で何か始めたいと思ったことはありますか？</p>
            <input type="radio" name="gender" id="male" value="1">
            <label for="male"> はい </label>
            <input type="radio" name="gender" id="female" value="2">
            <label for="female"> いいえ </label>
        </div>
        <div>
            <label for="age"> 年齢 </label>
            <select name="age" id="age">
                <option value="0" selected>選択してください。</option>
                <?php
                for ($num = 1; $num <= 7; $num++) {
                    echo '<option value="' . $num . '">' . $num . '0代</option>' . "\n";
                }
                ?>
                <option value="8">80代以上</option>
            </select>
        </div>
        <div>
            <p>好きなことはなんですか？</p>
            <?php
            $hobby = array(
                0 => "音楽",
                1 => "ヨガ",
                2 => "美容",
                3 => "カフェ巡り",
                4 => "旅行",
                5 => "カメラ",
                6 => "読書",
                7 => "その他"
            );
            $ids = array('music', 'yoga', 'beauty', 'cafe', 'travel', 'camera', 'book', 'other');
            foreach ($hobby as $key => $value) {
                echo '<label for="' . $ids[$key] . '"><input type="checkbox" name="hobby[]" value="'
                    . $key . '" id="' . $ids[$key] . '">' . $value . '</label>' . "\n";
            }

            ?>
        </div>
        <div>
            <input type="submit">
        </div>
    </form>





</body>

</html>