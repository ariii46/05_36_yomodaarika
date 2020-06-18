<?php



// データの受取
$name = $_POST['name'];
$email = $_POST['email'];
$subject=$_POST['subject'];
$message=$_POST['message'];


// 書き込みデータの作成（スペース区切りで最後に改行コードを追加）
$write_data = "{$name} {$email} {$subject} {$message}\n";
// var_dump($write_data);
// exit();


// ファイルを開く処理
$file = fopen('data/data.csv','a');
// var_dump($file);
// exit();
// ファイルロックの処理
flock($file, LOCK_EX);
// ファイル書き込み処理
fwrite($file, $write_data);
// ファイルアンロックの処理
flock($file, LOCK_UN);
// ファイルを閉じる処理
fclose($file);
// 入力画面へ移動
header('Location:contact_sent.html');

// txtファイルへの書き込みのみ行うので表示する画面は存在しない
