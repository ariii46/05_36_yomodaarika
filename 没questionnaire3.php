<?php
//アンケート結果が保存するたテキストファイルを指定
$textfile = './data/log.csv';
//ファイルを開く
$fp = fopen($textfile, 'rb');   //rで読み込みモード、bで互換性維持 

if (!$fp) {  //fopen()関数の戻り値を検証
    exit('ファイルがないか異常があります。');
}

//テキストを排他的にロックし、その戻り値を検証
if (!flock($fp, LOCK_EX)) {
    exit('ファイルをロックできませんでした。');
}

//ファイルポインタが EOF（最後）に達するまで、テキストの各行を読み出し、trim()関数で文字列の先頭および末尾にあるホワイトスペースを取り除き配列に格納
while (!feof($fp)) {
    $results[] = trim(fgets($fp));
}

if ($results[18] != 0) {  //アンケート結果が0でなければ集計
    echo '<p>アンケートの集計結果：総数 ' . $results[18] . ' 件</p>';

?>

    <table>
        <thead>
            <tr>
                <th>質問</th>
                <th>人数</th>
                <th>比率</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td>年齢</td>
                <?php
                $age10_rate = round($results[0] / $results[18] * 100);
                $age20_rate = round($results[1] / $results[18] * 100);
                $age30_rate = round($results[2] / $results[18] * 100);
                $age40_rate = round($results[3] / $results[18] * 100);
                $age50_rate = round($results[4] / $results[18] * 100);
                $age60_rate = round($results[5] / $results[18] * 100);
                $age70_rate = round($results[6] / $results[18] * 100);
                $age80_rate = round($results[7] / $results[18] * 100);

                echo '  <td>10代：' . $results[0] . '人<br>' .
                    '20代：' . $results[1] . '人<br>' .
                    '30代：' . $results[2] . '人<br>' .
                    '40代：' . $results[3] . '人<br>' .
                    '50代：' . $results[4] . '人<br>' .
                    '60代：' . $results[5] . '人<br>' .
                    '70代：' . $results[6] . '人<br>' .
                    '80代以上：' . $results[7] . '人</td>';
                echo '  <td>10代：' . $age10_rate . '%<br>' .
                    '20代：' . $age20_rate . '%<br>' .
                    '30代：' . $age30_rate . '%<br>' .
                    '40代：' . $age40_rate . '%<br>' .
                    '50代：' . $age50_rate . '%<br>' .
                    '60代：' . $age60_rate . '%<br>' .
                    '70代：' . $age70_rate . '%<br>' .
                    '80代以上：' . $age80_rate . '%</td>';
                ?>
            </tr>

            <!-- 試して入れて見ている -->
            <tr>
                <td>【Q1】今の働き方に満足していますか？</td>
                <?php
                //働き方の比率計算
                $manzoku_rate   = round($results[0] / $results[18] * 100);
                $hutsu_rate = round($results[1] / $results[18] * 100);
                $sukoshi_rate = round($results[2] / $results[18] * 100);
                $sugoku_rate = round($results[3] / $results[18] * 100);

                echo '  <td>満足：' . $results[0] . '人 普通：' . $results[1] . '人 少し変えたい：' . $results[2] . '人 すごく変えたい：' . $results[3] . '人</td>';
                echo '  <td>満足：' . $manzoku_rate . '% 普通：' . $hutsu_rate . '% 少し変えたい：' . $sukoshi_rate . '% すごく変えたい：' . $sugoku_rate . '% </td>';

                ?>
            </tr>

            <!-- 試して入れて見ている -->
            <!-- <tr>
                <td>【Q2】自分でなにか始めたいと思いますか？</td> -->
                <?php

                // $omou_rate   = round($results[0] / $results[34] * 100);
                // $sukoshiomou_rate = round($results[1] / $results[34] * 100);
                // $omowanai_rate = round($results[2] / $results[34] * 100);

                // echo '  <td>思う：' . $results[0] . '人 少し思う：' . $results[1] . '人 思わない：' . $results[2] . '人</td>';
                // echo '  <td>思う：' . $omou_rate . '% 少し思う：' . $sukoshiomou_rate . '% 思わない：' . $omowanai_rate . '% </td>';
                // ?>
            <!-- </tr> -->




            <tr>
                <td>趣味</td>

                <?php
                $hobby1_rate = round($results[10] / $results[18] * 100);
                $hobby2_rate = round($results[11] / $results[18] * 100);
                $hobby3_rate = round($results[12] / $results[18] * 100);
                $hobby4_rate = round($results[13] / $results[18] * 100);
                $hobby5_rate = round($results[14] / $results[18] * 100);
                $hobby6_rate = round($results[15] / $results[18] * 100);
                $hobby7_rate = round($results[16] / $results[18] * 100);
                $hobby8_rate = round($results[17] / $results[18] * 100);

                echo '  <td>音楽：' . $results[10] . '人<br>' .
                    'スポーツ：' . $results[11] . '人<br>' .
                    '車：' . $results[12] . '人<br>' .
                    'アート：' . $results[13] . '人<br>' .
                    '旅行：' . $results[14] . '人<br>' .
                    'カメラ：' . $results[15] . '人<br>' .
                    '読書：' . $results[16] . '人<br>' .
                    'その他：' . $results[17] . '人</td>';
                echo '  <td>音楽：' . $hobby1_rate . '%<br>' .
                    'スポーツ：' . $hobby2_rate . '%<br>' .
                    '車：' . $hobby3_rate . '%<br>' .
                    'アート：' . $hobby4_rate . '%<br>' .
                    '旅行：' . $hobby5_rate . '%<br>' .
                    'カメラ：' . $hobby6_rate . '%<br>' .
                    '読書：' . $hobby7_rate . '%<br>' .
                    'その他：' . $hobby8_rate . '%</td>';
                ?>
            </tr>
        </tbody>
    </table>
<?php
} else {
    // アンケートデータがない場合
    echo '  <p class="msg">表示できるようなアンケートデータがありません。</p>';
}
fclose($fp);
echo '<p class="link"><a href="questionnaire1.php">アンケートページへ戻る</a></p>';
?>