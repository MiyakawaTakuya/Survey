<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>textファイル書き込み型todoリスト（入力画面）</title>
</head>

<body>
  <form action="todo_txt_create.php" method="post">
    <fieldset>
      <legend>textファイル書き込み型todoリスト（入力画面）</legend>
      <a href="todo_txt_read.php">一覧画面へ</a>
      <div>
        Deadline: <input type="date" name="deadline">
      </div>
      <div>
        Todo: <input type="text" name="todo">
      </div>
      <div>
        Why?: <input type="text" name="why">
      </div>
      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form>

</body>

</html>