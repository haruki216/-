<?php
date_default_timezone_set('Asia/Tokyo');
$date = $_GET['date'];

// データベース接続
$pdo = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');

// メモを取得
$stmt = $pdo->prepare("SELECT memo FROM blogr_memo WHERE date = :date");
$stmt->execute([':date' => $date]);
$memo = $stmt->fetchColumn();

// メモが投稿された場合
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $memo = $_POST['memo'];
    $stmt = $pdo->prepare("INSERT INTO blogr_memo (date, memo) VALUES (:date, :memo) ON DUPLICATE KEY UPDATE memo = :memo");
    $stmt->execute([':date' => $date, ':memo' => $memo]);
    header("Location: memo.php?date=$date");
    exit();
}
?>

<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
      
        <h1 class=date> {{$date}} </h1>
        
        <form action="/date/{date}/store" method="POST">
            @csrf
            
            <div class="memo">
                <h2>Body</h2>
                <textarea name="record[memo]" style="width:300px; height:300px;" placeholder="腹筋×５０" >{{ old('record.memo') }}</textarea>
            </div>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>

