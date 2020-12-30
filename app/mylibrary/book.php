<?php require '../../component/php/header/header.php'; ?>
<?php require '../../component/php/pdo.php'; ?>
<div class="container">
    <a href="index.php">
        ＜＜ Myライブラリへ</a>
    <h4 class="mt-5 ml-5">貸出書籍一覧</h4>
    <?php require '../../component/php/book/rmaxcnt.php'; ?>
    <div class="row ml-5 mt-3">
        <?php
        $index = $pdo->prepare('SELECT * FROM rental WHERE customer_id = ? AND rental_flg = 1');
        $index->execute([$_SESSION['customer']['id']]);
        foreach ($index as $rental2) {
            $bookimg = $pdo->prepare('SELECT * FROM book WHERE id = ?');
            $bookimg->execute([$rental2['book_id']]);
            foreach ($bookimg as $img) {
                echo '<div class="col-3 m-2">';
                echo '<img src="../../img/book_img/', $img['img'], '" alt="img" height="80%" width="auto">';
                echo '</div>';
            }
        }
        ?>
    </div>
</div>
<?php require '../../component/php/footer/footer.php'; ?>