<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Kosugi+Maru&family=M+PLUS+Rounded+1c:wght@400;500&display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: "Kosugi Maru", sans-serif;
    }
  </style>
  <link rel="shortcut icon" href="favicon.ico" />
  <meta http-equiv="refresh" content="1; url=../home/index.php">
  <title>InQuirer 書籍貸出サイト</title>
</head>

<body style="background-color: #fbfbfb">
  <?php if (isset($_SESSION['customer'])) : ?>
    <?php unset($_SESSION['customer']); ?>
    <h1 class="text-center mt-5">ログアウトしました。</h1>
  <?php else : ?>
    <h1 class="text-center mt-5">すでにログアウトしています。</h1>
  <?php endif; ?>
  <?php require '../../component/php/footer/footer.php'; ?>