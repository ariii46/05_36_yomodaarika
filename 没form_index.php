<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>入力フォーム</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP" rel="stylesheet">
    <style>
        body {
            background: #f3f3f3;

        }

        .container {
            font-family: "Noto Sans JP";
            font-size: 20px;
            margin-top: 60px;
        }

        h1 {
            margin-bottom: 50px;
            text-align: center;
        }

        button {
            margin-top: 30px;
        }
    </style>
</head>

<body class="container">
    入力フォーム<br>
    <form action="form_create.php" method="post">
        名前：<input type="text" name="name" required><br>
        年代：
        <select name="age" id="">
            <option value="">選択してください</option>
            <option value="1">10代</option>
            <option value="2">20代</option>
            <option value="3">30代</option>
            <option value="4">40代以上</option>
        </select>
        <br>
        【Q1】今の働き方に満足しているか？<br>
        <input type="radio" name="work" value="満足">満足
        <input type="radio" name="work" value="普通">普通
        <input type="radio" name="work" value="少し変えたい">少し変えたい
        <input type="radio" name="work" value="すごく変えたい">すごく変えたい
        <br>
        【Q2】自分で何か始めたいと思いますか？<br>
        <input type="radio" name="start" value="思う">思う
        <input type="radio" name="start" value="少し思う">少し思う
        <input type="radio" name="start" value="思わない">思わない
        <br>
        【Q3】何か始めるに当たって不安な項目はありますか？<br>
        <input type="checkbox" name="anxiety" value="何からはじめていいかわからない">何からはじめていいかわからない
        <input type="checkbox" name="anxiety" value="資金面">資金面
        <input type="checkbox" name="anxiety" value="人とのつながりがない">人とのつながりがない
        <input type="checkbox" name="anxiety" value="現在の仕事と両立するか辞めるか迷っている">現在の仕事と両立するか辞めるか迷っている
        <br>
        【Q4】何か始めるにあたって嬉しいサービスはどれですか？<br>
        <input type="checkbox" name="anxiety" value="カフェみたいなコワーキングスペース">カフェみたいなコワーキングスペース
        <input type="checkbox" name="anxiety" value="提携美容室利用無料サービス">提携美容室利用無料サービス
        <input type="checkbox" name="anxiety" value="定期的な女子会や勉強会">定期的な女子会や勉強会
        <input type="checkbox" name="anxiety" value="起業サポート、学校紹介">起業サポート、学校紹介
        <br>
        【Q5】上記のようなサービスがある場合月額いくらで利用しようと思いますか？<br>
        <input type="number" min="1" max="9999" name="budget">円
        <br>
        【Q6】福岡女子スタートアップを盛り上げるためにご要望があればご意見ください⑅◡̈*<br>
        <textarea name="opinion" cols="40" rows="4" maxlength="150"></textarea>
        <br>



        <input type="submit" value="送信">
    </form>
</body>

</html>