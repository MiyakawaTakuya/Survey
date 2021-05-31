<?php
$str = "";   //変数定義
$data = [];  //空の配列を用意
// $data2 = [];

$file = fopen('data/todo.csv', 'r');
flock($file, LOCK_EX); // ファイルをロック

if ($file) {
  while ($line = fgets($file)) { // fgets()で1行ずつ取得→$lineに格納
    $str .= "<tr><td>{$line}</td></tr>"; // 取得したデータを$strに入れる .= は +=みたいな指示 }
    array_push($data, $line);  //JSONにしてJS使えるようにするため配列へ切り替えるため
  }
}
flock($file, LOCK_UN);
fclose($file);


?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>textファイル書き込み型todoリスト（一覧画面）</title>

</head>
<style>
  th {
    color: goldenrod;
  }
</style>

<body>
  <fieldset>
    <legend>textファイル書き込み型todoリスト（一覧画面）</legend>
    <a href="todo_txt_input.php">入力画面へ</a>
    <table>
      <thead>
        <tr>
          <th>todo</th>
          <th><?= $str ?></th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </fieldset>

  <script>
    const hoge = <?= json_encode($data) ?>;
    const data = hoge.map(x => {
      return {
        data: x.split(' ')[0],
        todo: x.split(' ')[1].split('\n').join(','),
        // todo: x.split(' ')[1].split('\n'),
        // todo: x.split(' ')[1],
      }
    })
    console.log(data);
  </script>
</body>

</html>