<?php
// var_dump($_POST);
// exit();
$todo = $_POST["todo"];   //データ受け取り
$deadline = $_POST["deadline"];   //データ受け取り
$why = $_POST["why"];   //データ受け取り

$write_data = "{$deadline},{$todo},{$why}\n";   //スペース区切りで最後に改行

$file = fopen('data/todo.csv', 'a');   //ファイルを開く 引数a
// $file = fopen('data/todo2.txt', 'a');
flock($file, LOCK_EX);   //ファイルをロック
fwrite($file, $write_data);   //データを書き込み
flock($file, LOCK_UN);   //ロック解除
fclose($file);  //ファイルを閉じる

header("Location:todo_txt_input.php");  //入力画面へ移動
