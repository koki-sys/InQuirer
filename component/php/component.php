<!-- これはコンポーネント一覧です これを埋め込んで開発を進めてください。-->

<!-- component/php/header ヘッダー -->
<?php require '../../component/php/header/header.php'; ?>
<?php require '../../component/php/header/auth_header.php'; ?>
<?php require '../../component/php/header/logined_header.php'; ?>
<?php require '../../component/php/header/nologin_header.php'; ?>

<!-- component/php/footer フッター -->
<?php require '../../component/php/footer/footer.php'; ?>

<!-- component/php/book 書籍関係（予約数、カート数、書籍一覧のカード、カートに入っているか） -->
<?php require '../../component/php/book/bookcart.php'; ?>
<?php require '../../component/php/book/card.php'; ?>
<?php require '../../component/php/book/cmaxcnt.php'; ?>
<?php require '../../component/php/book/rmaxcnt.php'; ?>

<!-- component/php/category カテゴリ関係 -->
<?php require '../../component/php/category/area.php'; ?>
<?php require '../../component/php/category/genre.php'; ?>

<!-- component/php/pdo.php データベース接続 -->
<?php require '../../component/php/pdo.php'; ?>