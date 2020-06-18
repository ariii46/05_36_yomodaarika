<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>



<body>
    <h1>アンケート入力ページ</h1>
    <!-- どこにデータを送るか -->
    <form action="questionnaire2.php" method="post">



        <!-- <div>
            <p>性別</p>
            <input type="radio" name="gender" id="male" value="1">
            <label for="male"> 男性 </label>
            <input type="radio" name="gender" id="female" value="2">
            <label for="female"> 女性 </label>
        </div> -->


        <!-- 年代の質問 -->
        <div>
            <label for="age"> 年代 </label>
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




        <!-- 質問１はこれ -->
        <div>
            <p>【Q1】今の働き方に満足していますか？</p>
            <input type="radio" name="work" id="manzoku" value="1">
            <label for="manzoku"> 満足 </label>
            <input type="radio" name="work" id="hutsu" value="2">
            <label for="hutsu"> 普通 </label>
            <input type="radio" name="work" id="sukoshi" value="3">
            <label for="sukoshi"> 少し変えたい </label>
            <input type="radio" name="work" id="kaetai" value="4">
            <label for="kaetai"> すごく変えたい </label>
        </div>




        <!-- 質問２はこれ -->
        <div>
            <p>【Q2】自分でなにか始めたいと思いますか？</p>
            <input type="radio" name="start" id="omou1" value="1">
            <label for="omou1"> 思う </label>
            <input type="radio" name="start" id="sukoshiomou1" value="2">
            <label for="sukoshiomou1"> 少し思う </label>
            <input type="radio" name="start" id="omowanai1" value="3">
            <label for="omowanai1"> 思わない </label>
        </div>




        <!-- 質問3はここから -->
        <div>
            <p>【Q3】何か始めるにあたって不安な項目はありますか? </p>
            <?php
            $start = array(
                0 => "何から始めていいかわからない",
                1 => "資金面",
                2 => "人とのつながりがない",
                3 => "起業サポート、学校紹介",
                4 => "現在の仕事と両立するか辞めるか迷っている"
            );
            $ids = array('start1', 'start2', 'start3', 'start4', 'start5');
            foreach ($start as $key => $value) {
                echo '<label for="' . $ids[$key] . '"><input type="checkbox" name="start[]" value="'
                    . $key . '" id="' . $ids[$key] . '">' . $value . '</label>' . "\n";
            }
            ?>
        </div>




        <!-- 質問４はここから -->
        <div>
            <p>【Q4】何か始めるにあたって嬉しいサービスはありますか？</p>
            <?php
            $service = array(
                0 => "カフェみたいなコワーキングスペース",
                1 => "提携美容室利用無料サービス",
                2 => "定期的な女子会や勉強会",
                3 => "起業サポート、学校紹介",
                4 => "会員の人の声がリアルに聴ける場",
                5 => "自作サービスのシェア"
            );
            $ids = array('cafe', 'salon', 'lady', 'support', 'member', 'share');
            foreach ($service as $key => $value) {
                echo '<label for="' . $ids[$key] . '"><input type="checkbox" name="service[]" value="'
                    . $key . '" id="' . $ids[$key] . '">' . $value . '</label>' . "\n";
            }
            ?>
        </div>



            <!-- 質問5はここから -->
        <div>
            <p>【Q5】趣味や好きなことを教えてください⑅◡̈*</p>
            <?php
            $hobby = array(
                0 => "音楽",
                1 => "スポーツ",
                2 => "ヨガ",
                3 => "美容",
                4 => "旅行",
                5 => "カメラ",
                6 => "読書",
                7 => "その他"
            );
            $ids = array('music', 'sport', 'yoga', 'beauty', 'travel', 'camera', 'book', 'other');
            foreach ($hobby as $key => $value) {
                echo '<label for="' . $ids[$key] . '"><input type="checkbox" name="hobby[]" value="'
                    . $key . '" id="' . $ids[$key] . '">' . $value . '</label>' . "\n";
            }
            ?>
        </div>


        <!-- 送信ボタン -->
        <div>
            <input type="submit">
        </div>
    </form>
</body>

</html>