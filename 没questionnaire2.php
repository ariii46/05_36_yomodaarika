<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>アンケート結果</h1>
    <?php
    //入力値に不正なデータがないかなどをチェックする関数
    function checkInput($var)
    {
        if (is_array($var)) {
            //$var が配列の場合、checkInput()関数をそれぞれの要素について呼び出す
            return array_map('checkInput', $var);
        } else {
            //php.iniでmagic_quotes_gpcが「on」の場合の対策
            if (get_magic_quotes_gpc()) {
                $var = stripslashes($var);
            }
            //NULLバイト攻撃対策
            if (preg_match('/\0/', $var)) {
                die('不正な入力（NULLバイト）です。');
            }
            //文字エンコードのチェック
            if (!mb_check_encoding($var, 'UTF-8')) {
                die('不正な文字エンコードです。');
            }
            //数値かどうかのチェック 
            if (!ctype_digit($var)) {
                die('不正な入力です。');
            }
            return (int) $var;
        }
    }

    //POSTされたデータをチェック
    $_POST = checkInput($_POST);

    $error = 0;  //変数の初期化



    //年代の入力の検証
    if (isset($_POST['age'])) {
        $age = $_POST['age'];
        if ($age < 1 || $age > 8) {
            $error = 1;  //入力エラー（値が1-8以外）
        }
    } else {
        $error = 1;  //入力エラー（値が未定義）
    }





    //【Q1】今の働き方についての入力の検証
    if (isset($_POST['work'])) {
        $work = $_POST['work'];
        if ($work == 1) {
            $workname = '満足';
        } elseif ($work == 2) {
            $workname = '普通';
        } elseif ($work == 3) {
            $workname = '少し変えたい';
        } elseif ($work == 4) {
            $workname = 'すごく変えたい';
        } else {
            $error = 1;  //入力エラー（値が 1 または 2 以外）
        }
    } else {
        $error = 1;  //入力エラー（値が未定義）
    }


    // 【Q2】自分で何か始めたいと思うかの入力の検証
    if (isset($_POST['start'])) {
        $start = $_POST['start'];
        if ($start == 1) {
            $startname = '思う';
        } elseif ($start == 2) {
            $startname = '少し思う';
        } elseif ($start == 3) {
            $startname = '思わない';
        } else {
            $error = 1;
        }
    } else {
        $error = 1;
    }




    //趣味の入力の検証
    if (isset($_POST['hobby'])) {
        $hobby = $_POST['hobby'];
        if (is_array($hobby)) {
            foreach ($hobby as $value) {
                if ($value < 0 || $value > 7) {
                    $error = 1;  //入力エラー（値が0-7以外）
                }
            }
        } else {
            $error = 1;  //入力エラー（値が配列ではない）
        }
    } else {
        $error = 1;  //入力エラー（値が未定義）
    }

    //エラーがない場合の処理（結果の表示）
    if ($error == 0) {
        echo '<dl>';
        // echo '<dt>今の働き方：</dt><dd>' . $workname . '</dd>';

        //年齢の値で分岐
        if ($age != 8) {
            echo '<dt>年齢：</dt><dd>' . $age . '0代</dd>';
        } else {
            echo '<dt>年齢：</dt><dd>80代以上</dd>';
        }

        //foreach で配列の数だけ繰り返し処理
        echo '<dt>趣味：</dt>';
        echo '<dd>';
        foreach ($hobby as $value) {
            switch ($value) {
                case 0:
                    echo '音楽<br>';
                    break;
                case 1:
                    echo 'スポーツ<br>';
                    break;
                case 2:
                    echo '車<br>';
                    break;
                case 3:
                    echo 'アート<br>';
                    break;
                case 4:
                    echo '旅行<br>';
                    break;
                case 5:
                    echo 'カメラ<br>';
                    break;
                case 6:
                    echo '読書<br>';
                    break;
                case 7:
                    echo 'その他<br>';
                    break;
            }
        }
        echo '</dd></dl>';

        //アンケート結果を保存するテキストファイルを指定
        $textfile = './data/log.csv';

        //読み込み／書き出し用にオープン (r+) 'b' フラグを指定
        $fp = fopen($textfile, 'r+b');
        if (!$fp) {
            exit('ファイルが存在しないか異常があります');
        }
        if (!flock($fp, LOCK_EX)) {
            exit('ファイルをロックできませんでした');
        }
        while (!feof($fp)) {
            $results[] = trim(fgets($fp));
        }



        // 年齢の表示
        $results[$age + 1]++;


        if ($age == 1) $results[0]++;
        if ($age == 2) $results[1]++;
        if ($age == 3) $results[2]++;
        if ($age == 4) $results[3]++;
        if ($age == 5) $results[4]++;
        if ($age == 6) $results[5]++;
        if ($age == 7) $results[6]++;
        if ($age == 8) $results[7]++;


        // 【Q１】の配列
        if ($work == 1) $results[8]++;
        if ($work == 2) $results[9]++;
        if ($work == 3) $results[10]++;
        if ($work == 4) $results[11]++;




        // 【Q2】の配列
        // if ($start == 1) $results[12]++;
        // if ($start == 2) $results[13]++;
        // if ($start == 3) $results[14]++;







        // 好きなことのfor文
        foreach ($hobby as $value) {
            $results[$value + 10]++;
        }

        $results[34]++;

        rewind($fp);

        foreach ($results as $value) {
            fwrite($fp, $value . "\n");
        }

        fclose($fp);

        echo '<p class="message sucess">以上の内容を保存しました。<br>アンケートにご協力いただきありがとうございました！</p>';
        echo '<p class="message"><a href="questionnaire3.php">集計結果ページへ</a></p>';
    } else {
        echo '<p class="message error">恐れ入りますが<a href="questionnaire1.php">アンケート入力ページ</a>に戻り、アンケートの項目全てにお答えください。</p>';
    }

    ?>
</body>

</html>